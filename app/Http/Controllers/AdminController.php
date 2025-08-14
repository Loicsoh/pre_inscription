<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PaiementDemandeNotification;
use App\Notifications\InscriptionNotification;

class AdminController extends Controller
{
    public function notifications()
    {
        $notifications = auth()->user()->notifications;
        return view('admin.notifications.index', compact('notifications'));
    }

    public function showInscription(User $user)
    {
        // Charger toutes les données d'inscription
        $civilstatut = $user->civilstatut;
        $level = $user->level;
        $urgence = $user->urgence;
        // ... autres modèles

        return view('admin.inscription.show', compact('user', 'civilstatut', 'level', 'urgence'));
    }

    public function demanderPaiement(User $user)
    {
        // Envoyer la notification de paiement
        $message = "Votre paiement a été demandé. Veuillez effectuer le paiement dès que possible.";
        $user->notify(new \App\Notifications\PaiementDemandeNotification($message));

        return back()->with('success', "Une notification de paiement a été envoyée à {$user->name}.");
    }

    public function valider($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['statut' => 'validé']);

        // Envoyer une notification à l'utilisateur
        $user->notify(new PaiementDemandeNotification());

        return back()->with('success', "L'inscription de {$user->name} est validée. Demande de paiement envoyée.");
    }

    public function marquerPaye($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['statut' => 'payé']);

        return back()->with('success', "Le paiement de {$user->name} est enregistré.");
    }

    

    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }
}