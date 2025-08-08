<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CivilStatut;
use App\Models\Finance;
use App\Models\Level;
use App\Models\Parcour;
use App\Models\Urgence;
use App\Models\Specialite;
use Illuminate\Support\Facades\Auth;

class InscrpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscription.show-inscription');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('indcription.show-inscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();

        // Récupérer toutes les données liées
        $civilstatut = CivilStatut::where('user_id', $user->id)->first();
        $level = Level::where('user_id', $user->id)->first();
        $financial = Finance::where('user_id', $user->id)->first();
        $parcour = Parcour::where('user_id', $user->id)->first();
        $urgence = Urgence::where('user_id', $user->id)->first();

        $specialites = Specialite::all();

        return view('inscription.show-inscription', compact('civilstatut', 'financial', 'level', 'parcour', 'urgence'));
    }



    public function submit(Request $request)
    {
        // Valider toutes les données
        $validated = $request->validate([
            //civilstatut
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'ville' => 'required|string|max:255',
            'Departement' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'nationalite' => 'required|string|max:255',
            'situation_familiale' => 'required|in:celibataire,marié',
            'handicape' => 'sometimes|boolean',


            // Level
            'obtention' => 'required|date',
            'serie' => 'required|string|max:255',
            'mention' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'hebergement' => 'required|in:parental,externale,autre',
            'quartier' => 'required|string|max:255',
            'specialite_id' => 'required|exists:specialites,id',

            // Financial
            'financial_type' => 'required',
            'mode' => 'required',
            'immigration' => 'required',

            
            // Parcour
            'premiere' => 'required',
            'deuxieme' => 'required',
            'troisieme' => 'required',
            'quatrieme' => 'required',

            // Urgence
            'nom_urg' => 'required|string|max:255',
            'tel_urg' => 'required|string|max:09',
        ]);

        $user = Auth::user();

        // Mettre à jour ou créer chaque enregistrement
        Level::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

        Urgence::updateOrCreate(
            ['user_id' => $user->id],
            [
                'nom_urg' => $validated['nom_urg'],
                'tel_urg' => $validated['tel_urg'],
                'user_id' => $user->id,
            ]
        );

        Parcour::updateOrCreate(
            ['user_id' => $user->id],
            [
                'formation' => $validated['formation'],
                'objectif' => $validated['objectif'],
                'user_id' => $user->id,
            ]
        );

        // Optionnel : marquer l'inscription comme terminée
        $user->update(['inscription_complete' => true]);

        return redirect()->route('dashboard')->with('success', '✅ Inscription soumise avec succès !');
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
