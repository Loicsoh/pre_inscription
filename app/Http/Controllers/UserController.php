<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to retrieve and display users
        $users = User::all(); // Assuming you have a User model
        $userscount = $users->count();
        return view('user.userlist', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    $request->validate([
        'role' => 'required|string|in:admin,user', // adaptez selon vos rôles
    ]);

    $user = User::findOrFail($id);
    $user->role = $request->role;
    $user->save();

    return redirect()->back()->with('success', 'Rôle mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userliste.user')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
