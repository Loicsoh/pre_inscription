<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\CivilStatutController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FinaceController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ParcourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\UrgenceController;
use App\Http\Controllers\UserController;
use App\Models\Level;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [AcceuilController::class, 'index'])->name('Index');

// Page Home
Route::get('/acceuil/home', [AcceuilController::class, 'home'])->name('Home');

// Page pré-inscription

// Page création filière (si besoin d'une page spéciale hors resource)
Route::get('/create', [AcceuilController::class, 'create'])->name('filieres.create');

// Routes resource pour filières (gère index, create, store, show, edit, update, destroy)
Route::resource('filieres', FiliereController::class);

// Routes resource pour spécialités
Route::resource('specialites', SpecialiteController::class);

Route::get('/userliste', [UserController::class, 'index'])->name('userliste.user');
Route::resource('users', UserController::class);
Route::patch('/users/{id}/update-role', [UserController::class, 'update'])->name('users.updateRole');

Route::resource('/civilstatut', CivilStatutController::class);

// Correction : une seule définition cohérente pour /level
Route::middleware('auth')->group(function () {
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::post('/level', [LevelController::class, 'store'])->name('level.store');
});

require __DIR__.'/auth.php';
// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AcceuilController::class, 'dashboardSpecialite'])->name('dashboard');

// Profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('finance', FinaceController::class);
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::post('/level', [LevelController::class, 'store'])->name('level.store');
    Route::resource('parcour', ParcourController::class);
    Route::resource('urgence', UrgenceController::class);
});

require __DIR__.'/auth.php';