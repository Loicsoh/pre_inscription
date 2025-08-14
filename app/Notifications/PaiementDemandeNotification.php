<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaiementDemandeNotification extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message = "Votre inscription a été validée. Veuillez procéder au paiement.")
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Paiement de votre inscription')
            ->greeting("Bonjour {$notifiable->name},")
            ->line($this->message)
            ->action('Effectuer le paiement', url('/paiement'))
            ->line('Merci de compléter le paiement pour finaliser votre inscription.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'link' => '/paiement',
            'type' => 'paiement'
        ];
    }
}