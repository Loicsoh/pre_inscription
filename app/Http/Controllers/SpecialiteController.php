<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialites = Specialite::paginate(3);
        return view('gestions.specialites.index-specialite', compact('specialites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        $specialites = Specialite::all();
        return view('gestions.specialites.create-specialite', compact('specialites','filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|unique:specialite,name',
        'code' => 'required|string|unique:specialite,code',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        'filiere_id' => 'required|exists:filieres,id',
        'niveau' => 'required|string',
        'user_id' => 'nullable|exists:users,id',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('filieres_images', 'public');
        $validated['image'] = $path;
    }

        if (Specialite::where('name', $validated['name'])->exists()) {
            return redirect()->back()->withErrors(['name' => 'Cette spécialité existe déjà.'])->withInput();
        }elseif (Specialite::where('code', $validated['code'])->exists()) {
            return redirect()->back()->withErrors(['code' => 'Ce code de spécialité existe déjà.'])->withInput();
        }

    Specialite::create($validated);

        return redirect()->route('specialites.index')
            ->with('success', 'Specialite créée avec succès.');
    }

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $specialite = Specialite::findOrFail($id);
        $filiere = Filiere::findOrFail($specialite->filiere_id);

        return view('gestions.specialites.show-specialite', compact('specialite', 'filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specialite = Specialite::findOrFail($id);
        $filieres = Filiere::all();
        return view('gestions.specialites.edit-specialite', compact('specialite', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialite $specialite)
    {
         $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        'filiere_id' => 'required|exists:filieres,id',
        'niveau' => 'required|string',
    ]);

    $data = [
        'name' => $request->name,
        'code' => $request->code,
        'description' => $request->description,
        'filiere_id' => $request->filiere_id,
        'niveau' => $request->niveau,
    ];

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('specilates_images', 'public');
        $data['image'] = $path;
    }

    $specialite->update($data);

    return redirect()->route('specialites.index')
        ->with('success', 'Specialité modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();

        return redirect()->route('specialites.index')
            ->with('success', 'Specialitée supprimée avec succès.');
        }
    }
}
