<?php

namespace App\Http\Controllers;

use App\Models\Urgence;
use App\Models\User;
use App\Notifications\InscriptionNotification;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class UrgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscription.urgence');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription.urgence');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nom_urg' => 'required|string|max:255',
        'tel_urg' => 'required|string|max:20',
    ]);

    $validated['user_id'] = auth()->id();
    $urgence = Urgence::create($validated);

    // Mettre à jour le statut de l'utilisateur
    auth()->user()->update(['statut' => 'en attente']);

    // Envoyer la notification à l'admin
    $admin = User::where('role', 'admin')->first();
    if ($admin) {
        $admin->notify(new InscriptionNotification(auth()->user()));
    }

     try {
            Urgence::create($validated);
            return redirect()->route('inscription.show', ['id' => auth()->id()])
                   ->with('success', 'phase 5 enregistrée avec succès!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['creation_error' => "Une erreur est survenue lors de l'enregistrement : " . $e->getMessage()]);
        }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}