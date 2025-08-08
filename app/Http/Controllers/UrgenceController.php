<?php

namespace App\Http\Controllers;

use App\Models\Urgence;
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
            'tel_urg' => 'required|string|max:09',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $urgence = Urgence::create($validated);
        return redirect()->route('inscription.show',$urgence->id)
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
