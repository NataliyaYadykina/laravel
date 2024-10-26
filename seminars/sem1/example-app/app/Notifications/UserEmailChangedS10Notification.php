<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserEmailChangedS10Notification extends Notification
{
    use Queueable;

    private string $oldEmail;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $oldEmail)
    {
        $this->oldEmail = $oldEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $notifiable->id,
            'old_email' => $this->oldEmail,
            'new_email' => $notifiable->email,
        ];
    }
}
