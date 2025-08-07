<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscription.finance');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inscription.finance');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'financial_type' => 'required',
            'mode' => 'required',
            'immigration' => 'required',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['immigration'] = $validated['immigration'] === 'Oui' ? 1 : 0;

        try {
            Finance::create($validated);
            return redirect()->route('parcour.index')
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