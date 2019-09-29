<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifySponsorshipContactOptIn;

final class TicketUser extends Model
{
    use Notifiable;

    protected $fillable = [
        'slug',
        'reference',
        'name',
        'email',
        'event_id',
        'event_slug',
        'opt_in_confirmed',
        'opted_in_to_be_contacted',
    ];

    protected $casts = [
        'opt_in_confirmed' => 'bool',
        'opted_in_to_be_contacted' => 'bool',
    ];

    public function __construct(array $attributes = [])
    {
        $this->marketingContactOptInConfirmation($attributes['responses'] ?? []);

        if (isset($attributes['responses'])) {
            unset($attributes['responses']);
        }

        parent::__construct($attributes);
    }

    private function marketingContactOptInConfirmation(array $responses): void
    {
        $this->attributes['opt_in_confirmed'] = false;

        if (!$confirmationSlug = config('tito.ticket_confirmation_slug')) {
            $this->attributes['opted_in_to_be_contacted'] = false;
            return;
        }

        $confirmation = $responses[$confirmationSlug] ?? false;
        $confirmed = $confirmation ? strtolower($confirmation) === 'yes' : false;

        $this->attributes['opted_in_to_be_contacted'] = $confirmed;
    }

    public function sendOptInConfirmationNotification(): void
    {
        $this->notify(new VerifySponsorshipContactOptIn($this));
    }

    public function getEmailForVerification(): string
    {
        return $this->email;
    }
}
