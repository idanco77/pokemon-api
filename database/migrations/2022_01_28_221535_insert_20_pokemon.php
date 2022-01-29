<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Insert20Pokemon extends Migration
{
    public function up(): void
    {
        Artisan::call('pokemon:create');
    }

    public function down(): void
    {

    }
}
