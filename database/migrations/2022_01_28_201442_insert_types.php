<?php

use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertTypes extends Migration
{
    public function up(): void
    {
        Type::insert([
            ['type' => 'Fighting',],
            ['type' => 'Flying',],
            ['type' => 'Poison',],
            ['type' => 'Ground',],
            ['type' => 'Rock',],
            ['type' => 'Bug',],
            ['type' => 'Ghost',],
            ['type' => 'Steel',],
            ['type' => 'Fire',],
            ['type' => 'Water',],
            ['type' => 'Grass',],
            ['type' => 'Electric',],
            ['type' => 'Psychic',],
            ['type' => 'Ice',],
            ['type' => 'Dragon',],
            ['type' => 'Dark',],
            ['type' => 'Fairy',],
            ['type' => 'Normal'],
        ]);


















    }

    public function down()
    {
        //
    }
}
