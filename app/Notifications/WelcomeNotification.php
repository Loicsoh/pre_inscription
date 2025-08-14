<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Bienvenue',
            'message' => 'Bienvenue sur la plateforme !',
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Bienvenue',
            'message' => 'Bienvenue sur la plateforme !',
        ];
    }
}