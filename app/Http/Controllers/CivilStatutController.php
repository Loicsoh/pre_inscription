<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CivilStatut;
use App\Models\User;

class CivilStatutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscription.civilstatut');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription.civilstatut');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $user_id = $request->input('user_id');

    $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'ville' => 'required|string|max:255',
            'Departement' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'nationalite' => 'required|string|max:255',
            'situation_familiale' => 'required|in:celibataire,marié',
            'handicape' => 'sometimes|boolean'
        ]);

        $validated['handicape'] = $request->has('handicape') ? true : false;
        $validated['user_id'] = auth()->id();

        try {
            CivilStatut::create($validated);
        return redirect()->route('level.index') // Assurez-vous que cette route existe
               ->with('success', 'Phase 1 enregistrée avec succès !');
        } catch (\Exception $e) {
        return redirect()->back()
               ->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
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
