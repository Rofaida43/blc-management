<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VolController;
use App\Http\Controllers\RepasController;
use App\Http\Controllers\BlcController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
  
Route::get('/', function () {
    return redirect('/dashboard');
});


// Pages de login/logout
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return redirect('/clients'); // Redirige vers la page principale
})->name('dashboard')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('produits', ProduitController::class);
    Route::resource('vols', VolController::class);
    Route::resource('repas', RepasController::class);
    Route::resource('blcs', BlcController::class);
    Route::resource('users', UserController::class);

});
