<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypes extends Migration
{
    public function up()
    {
        Schema::create('types', static function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'Normal',
                'Fighting',
                'Flying',
                'Poison',
                'Ground',
                'Rock',
                'Bug',
                'Ghost',
                'Steel',
                'Fire',
                'Water',
                'Grass',
                'Electric',
                'Psychic',
                'Ice',
                'Dragon',
                'Dark',
                'Fairy',
            ]);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}
