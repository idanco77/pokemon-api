<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('list', [PokemonController::class, 'getListOfAllPokemon']);
Route::post('store', [PokemonController::class, 'store']);
Route::get('index', [PokemonController::class, 'index']);
Route::delete('{pokemon}', [PokemonController::class, 'destroy']);
