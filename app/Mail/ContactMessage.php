<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class ContactMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Email details
     *
     * @var Collection
     */
    public $details;

    /**
     * Create a new message instance.
     *
     * @param Collection $details
     */
    public function __construct(Collection $details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->details->get('email'), $this->details->get('name'))
                    ->subject(config('app.name').' - Contact form submitted')
                    ->markdown('emails.contact');
    }
}
