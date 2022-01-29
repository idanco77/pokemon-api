<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailedPokemonResource extends JsonResource
{
    public function toArray($request): array
    {
       return [
           'id' => $this->id,
           'name' => $this->name,
           'image' => $this->image,
           'weight' => $this->weight,
           'types' => $this->types->pluck('type')->toArray(),
       ];
    }
}
