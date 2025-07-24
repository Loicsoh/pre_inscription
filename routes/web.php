<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', [AcceuilController::class, 'index'])->name('Index');
Route::get('acceuil.home', [AcceuilController::class, 'home'])->name('Home');
Route::get('/inscription', [InscriptionController::class, "index"])->name('Inscrip');
Route::get('/create', [AcceuilController::class, 'create'])->name('Create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
