<?php

namespace App\Http\Controllers;

use App\Models\Parcour;
use Illuminate\Http\Request;

class ParcourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscription.parcour');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription.parcour');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'premiere' => 'required',
            'deuxieme' => 'required',
            'troisieme' => 'required',
            'quatrieme' => 'required',
        ]);
        $validated['user_id'] = auth()->user()->id;
        Parcour::create($validated);
        return redirect()->route('urgence.index')
            ->with('success', 'Données enregistrées avec succès!');
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
