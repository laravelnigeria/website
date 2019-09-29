<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

final class WebhookRequest extends FormRequest
{
    public function authorize(): bool
    {
        $allowedWebhooks = (array) config('tito.allowed_webhooks');

        return in_array($this->webhookName(), $allowedWebhooks);
    }

    public function rules(): array
    {
        if ($this->isRegistrationWebhook()) {
            return $this->registrationRules();
        }

        return [];
    }

    public function isRegistrationWebhook(): bool
    {
        return Str::startsWith($this->webhookName(), 'registration.');
    }

    protected function registrationRules(): array
    {
        return [
            'tickets.*.slug' => 'required|string',
            'tickets.*.reference' => 'required|string',
            'tickets.*.name' => 'required|string',
            'tickets.*.email' => 'required|email',
            'tickets.*.responses' => 'required|array',
            'tickets.*.responses.*' => 'required|string',
            'event.id' => 'required|integer',
            'event.slug' => 'required|string',
        ];
    }

    private function webhookName(): string
    {
        return (string) $this->header('X-Webhook-Name');
    }
}
