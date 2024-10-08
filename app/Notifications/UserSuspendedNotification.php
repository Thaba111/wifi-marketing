<?php

namespace App\Notifications;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserSuspendedNotification extends Notification
{
    public function __construct(readonly public string $suspensionReason)
    {

    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello' . $notifiable->name . '!')
            ->subject('Your Account has been suspended')
            ->line('Your account has been suspended for the following reason:')
            ->line($this->suspensionReason)
            ->line('If you believe this is a mistake, please contact us.');
    }

    public function toArray($notifiable): array
    {
        return [

        ];
    }
}
