<?php
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\CivilStatutController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FinaceController;
use App\Http\Controllers\InscrpController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ParcourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\UrgenceController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [AcceuilController::class, 'index'])->name('Index');

// Page Home
Route::get('/acceuil/home', [AcceuilController::class, 'home'])->name('Home');

// Page création filière (si besoin d'une page spéciale hors resource)
Route::get('/create', [AcceuilController::class, 'create'])->name('filieres.create');

// Routes resource pour filières et spécialités (CRUD complet)
Route::resource('filieres', FiliereController::class);
Route::resource('specialites', SpecialiteController::class);

// Dashboard public (protégé par auth et verified)
Route::get('/dashboard', function () {
    $userCount = User::count();
    return view('dashboard', compact('userCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par le middleware personnalisé
Route::middleware(['auth', 'web'])->group(function () {
    // Dashboard spécialité (si besoin d'une vue différente)
    Route::get('/dashboard-specialite', [AcceuilController::class, 'dashboardSpecialite'])->name('dashboard.specialite');

    // Utilisateurs
    Route::get('/userliste', [UserController::class, 'index'])->name('userliste.user');
    Route::resource('users', UserController::class);
    Route::patch('/users/{id}/update-role', [UserController::class, 'update'])->name('users.updateRole');

    // Inscription (multi-étapes)
    Route::resource('inscription', InscrpController::class);
    Route::get('inscription/show/{id}', [InscrpController::class, 'show'])->name('inscription.show');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Level
    Route::get('/level', [LevelController::class, 'index'])->name('level.index');
    Route::post('/level', [LevelController::class, 'store'])->name('level.store');

    // CivilStatut, Finance, Parcour, Urgence
    Route::resource('civilstatut', CivilStatutController::class);
    Route::resource('finance', FinaceController::class);
    Route::resource('parcour', ParcourController::class);
    Route::resource('urgence', UrgenceController::class);
});

require __DIR__.'/auth.php';