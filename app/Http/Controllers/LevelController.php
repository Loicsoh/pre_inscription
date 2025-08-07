<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Specialite;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialites = Specialite::all();
        return view('inscription.level', compact('specialites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        return view('inscription.level');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'obtention' => 'required|date|before_or_equal:today',
        'serie' => 'required|string|max:255',
        'mention' => 'required|string|max:255',
        'etablissement' => 'required|string|max:255',
        'chxspecialite' => 'nullable|string|max:255',
        'specialite_id' => 'required|exists:specialite,id',
        'fonction' => 'nullable|string|max:255',
        'hebergement' => 'nullable|in:parental,externale,autre',
        'quartier' => 'nullable|string|max:255'
    ]);

    $validated['user_id'] = Auth::id();

    try {
        Level::create($validated);
        return redirect()->route('finance.index')
               ->with('success', 'Données enregistrées avec succès!');
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['creation_error' => "Une erreur est survenue lors de l'enregistrement : " . $e->getMessage()]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $level = Level::findOrFail($id);
        return view('inscription.level_show', compact('level'));
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