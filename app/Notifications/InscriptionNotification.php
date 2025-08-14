<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User; // ou Urgence, selon ce que tu veux passer

class InscriptionNotification extends Notification
{
    use Queueable;

    public $user; // ou $urgence

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail']; // ou ['database', 'mail']
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle inscription en attente de vérification')
            ->greeting("Bonjour Admin,")
            ->line("L'utilisateur **{$this->user->name}** a soumis sa fiche d'inscription.")
            ->action('Vérifier l\'inscription', url('/admin/inscriptions/' . $this->user->id))
            ->line('Merci de valider les informations.');
    }

    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'message' => 'a soumis son inscription.',
        ];
    }
}