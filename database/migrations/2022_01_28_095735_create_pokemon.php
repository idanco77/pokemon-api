<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemon extends Migration
{
    public function up(): void
    {
        Schema::create('pokemon', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->integer('weight');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
}
