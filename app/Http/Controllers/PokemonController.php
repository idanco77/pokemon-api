<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonStoreRequest;
use App\Http\Resources\DetailedPokemonResource;
use App\Http\Resources\PokemonListResource;
use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;
use App\Services\PokeApiService;
use App\Services\PokemonProcessor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function getListOfAllPokemon(Request $request, PokeApiService $pokeApiService): JsonResponse
    {
        $list = $pokeApiService->getListOfAllPokemon();
        if ($list) {
            return response()->json($list->pluck('name')->toArray(), 200);
        }

        return response()->json(['message' => 'Bad Request'], 400);
    }

    public function store(PokemonStoreRequest $request, PokemonProcessor $pokemonProcessor): JsonResponse
    {
        $pokemon = $pokemonProcessor->process($request->pokemon);

        if ($pokemon) {
            return response()->json(['message' => 'Pokemon Saved'], 200);
        }
        return response()->json(['message' => 'Bad Request'], 400);
    }

    public function destroy(Pokemon $pokemon): JsonResponse
    {
        $isDeleted = $pokemon->delete();
        if ($isDeleted) {
            return response()->json(['message' => 'Deleted Successfully'], 200);
        }

        return response()->json(['message' => 'Bad Request'], 400);
    }

    public function index(Pokemon $pokemon): JsonResponse
    {
        return response()->json(DetailedPokemonResource::collection($pokemon->with('types')->get()), 200);
    }
}
