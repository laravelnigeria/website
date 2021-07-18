<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

final class VerifySponsorshipContactOptIn extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject(Lang::get('Laravel Nigeria: Verify Opt-in'))
            ->line(Lang::get('You specified you would like to be contacted by our sponsors regarding job oppurtunities and more. Please click below to confirm this.'))
            ->action(Lang::get('Sure, Sign me up'), $verificationUrl)
            ->line(Lang::get('If you do not want to hear about new oppurtunities and more, no further action is required.'));
    }

    /**
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'sponsor.optin.verify',
            Carbon::now()->addMinutes(Config::get('tito.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
