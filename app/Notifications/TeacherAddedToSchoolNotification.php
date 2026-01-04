<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TeacherAddedToSchoolNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $schoolName,
        public string $tempPassword,
        public string $loginUrl
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("You're added as a Teacher ({$this->schoolName})")
            ->greeting("Hi {$notifiable->name},")
            ->line("{$this->schoolName} has added you as a Teacher.")
            ->line("Login email: {$notifiable->email}")
            ->line("Password: {$this->tempPassword}")
            ->action('Login Now', $this->loginUrl)
            ->line("You can change your password after login.");
    }
}
