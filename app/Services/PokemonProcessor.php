<?php

namespace App\Services;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class PokemonProcessor extends PokemonApiBase
{
    public function process(string $name): bool
    {
        $url = 'https://pokeapi.co/api/v2/pokemon/' . $name;
        $res = $this->makeCurlCall($url);
        if (! $res) {
            return false;
        }
        DB::transaction(static function () use ($res) {
            $pokemon = Pokemon::create([
                'image' => $res->sprites->front_default,
                'name' => $res->name,
                'weight' => Helpers::hectogramToKg($res->weight)
            ]);
            $typeIds = Type::whereIn('type', collect($res->types)->pluck('type.name'))->get()->pluck('id')->toArray();
            $pokemon->types()->attach($typeIds);
        });

        return true;
    }
}
