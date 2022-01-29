<?php

namespace App\Console\Commands;

use App\Services\PokemonProcessor;
use Illuminate\Console\Command;

class PokemonCreateCommand extends Command
{
    protected $signature = 'pokemon:create';

    protected $description = 'Fill the database with 20 Pokemon';

    public function handle()
    {
        $names = [
            'barboach',
            'teddiursa',
            'yanma',
            'omanyte',
            'kyurem',
            'staryu',
            'charizard-mega-x',
            'gallade',
            'bouffalant',
            'meganium',
            'venusaur-mega',
            'charizard-mega-y',
            'absol',
            'porygon',
            'bellsprout',
            'mamoswine',
            'venomoth',
            'golem',
            'samurott',
            'grotle',
        ];
        $bar = $this->output->createProgressBar(count($names));
        $bar->start();
        foreach ($names as $name) {
            try {
                (new PokemonProcessor())->process($name);
                $bar->advance();
                $this->info($name . 'stored successfully!');
            } catch (\Exception $error) {
                $this->info('There was an error with ' . $name);
                return 'An error occurred';
            }
        }
        $bar->finish();
    }
}
