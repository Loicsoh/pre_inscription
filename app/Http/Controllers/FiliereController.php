<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Affiche la liste des filières.
     */
    public function index()
    {
        $filieres = Filiere::paginate(3);
        return view('gestions.filieres.index-filiere', compact('filieres'));
    }

    /**
     * Affiche le formulaire de création d'une filière.
     */
    public function create()
    {
        return view('gestions.filieres.create-filiere');
    }

    /**
     * Enregistre une nouvelle filière.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'name' => 'required|string|unique:filieres,name',
        'code' => 'required|string|unique:filieres,code',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
    ]);


        if (Filiere::where('name', $validated['name'])->exists()) {
        return redirect()->back()->withErrors(['name' => 'Cette filière existe déjà.'])->withInput();
    }elseif (Filiere::where('code', $validated['code'])->exists()) {
        return redirect()->back()->withErrors(['code' => 'Ce code de filière existe déjà.'])->withInput();
    }

        if ($request->hasFile('image')) {
        $path = $request->file('image')->store('filieres_images', 'public');
        $validated['image'] = $path;
    }

    Filiere::create($validated);

        return redirect()->route('filieres.index')
            ->with('success', 'Filière créée avec succès.');
    }

    /**
     * Affiche une filière spécifique.
     */
    public function show($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('gestions.filieres.show-filiere', compact('filiere'));
    }

    /**
     * Affiche le formulaire d'édition d'une filière.
     */
    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('gestions.filieres.edit-filiere', compact('filiere'));
    }

    /**
     * Met à jour une filière.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
    ]);

    $filiere = Filiere::findOrFail($id);

    $data = [
        'name' => $request->name,
        'code' => $request->code,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('filieres_images', 'public');
        $data['image'] = $path;
    }

    $filiere->update($data);

    return redirect()->route('filieres.index')
        ->with('success', 'Filière modifiée avec succès.');
    }

    /**
     * Supprime une filière.
     */
    public function destroy($id)
    {
        $filiere = Filiere::findOrFail($id);
        $filiere->delete();

        return redirect()->route('filieres.index')
            ->with('success', 'Filière supprimée avec succès.');
    }
}
