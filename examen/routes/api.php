<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\LlibreAutorController;
use App\Http\Controllers\LlibreController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);

Route::post('register', [AuthController::class, 'register']);


Route::get('llibres', [LlibreController::class, 'index']);
Route::get('llibres/{id}', [LlibreController::class, 'show']);
Route::post('llibres', [LlibreController::class, 'store']);
Route::put('llibres/{id}', [LlibreController::class, 'update']);
Route::delete('llibres/{id}', [LlibreController::class, 'destroy']);

Route::get('autors', [AuthorsController::class, 'index']);
Route::get('autors/{id}', [AuthorsController::class, 'show']);
Route::post('autors', [AuthorsController::class, 'store']);
Route::put('autors/{id}', [AuthorsController::class, 'update']);
Route::delete('autors/{id}', [AuthorsController::class, 'destroy']);

Route::post('llibres/{id}/autors/{autor_id}', [LlibreAutorController::class, 'assign']);
Route::delete('llibres/{id}/autors/{autor_id}', [LlibreAutorController::class, 'unassign']);
Route::get('llibres/{id}/autors', [LlibreAutorController::class, 'getAutors']);
Route::get('autors/{id}/llibres', [LlibreAutorController::class, 'getLlibres']);
