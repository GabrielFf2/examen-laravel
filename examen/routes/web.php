<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PersonaController;
Route::delete('/billetes/{billete}', [PersonaController::class, 'destroyBillete'])->name('billetes.destroy');
Route::post('/personas/{persona}/billetes', [PersonaController::class, 'addBillete'])->name('personas.addBillete');
Route::get('/personas/{persona}/billetes', [PersonaController::class, 'showBilletes'])->name('personas.showBilletes');
Route::get('/personas/{persona}/pokemons', [PersonaController::class, 'showPokemons'])->name('personas.showPokemons');
Route::post('/personas/{persona}/pokemons', [PersonaController::class, 'storePokemon'])->name('pokemons.store');
Route::delete('/pokemons/{pokemon}', [PersonaController::class, 'destroyPokemon'])->name('pokemons.destroy');

Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');

Route::view('/', 'dashboard')->name('dashboard');

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');


Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);


require __DIR__.'/auth.php';
