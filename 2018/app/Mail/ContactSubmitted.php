<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use Illuminate\Queue\SerializesModels;

class ContactSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @param  \Illuminate\Support\Collection $data
     * @return void
     */
    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')
                    ->with($this->data->toArray())
                    ->from($this->data->get('email'), $this->data->get('name'))
                    ->replyTo($this->data->get('replyTo'))
                    ->subject('Laravel Nigeria New Message');
    }
}
