<?php

namespace App\Services;

use Illuminate\Support\Collection;

class PokeApiService extends PokemonApiBase
{
    private $baseUrl = 'https://pokeapi.co/api/v2/';
    public function getListOfAllPokemon(): Collection
    {
        $url = $this->baseUrl . 'pokemon?limit=2000';
        $list = collect($this->makeCurlCall($url)->results);

        return $list;
    }
}
