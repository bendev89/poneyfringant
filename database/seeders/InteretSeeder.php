<?php

namespace Database\Seeders;

use App\Models\Interet;
use Illuminate\Database\Seeder;

class InteretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interet::create([
            'nom' => 'Sport'
        ]);
        Interet::create([
            'nom' => 'Musique'
        ]);
        Interet::create([
            'nom' => 'Jeux vidéos'
        ]);
        Interet::create([
            'nom' => 'Lecture'
        ]);
        Interet::create([
            'nom' => 'Informatique'
        ]);
        Interet::create([
            'nom' => 'Sorties'
        ]);
        Interet::create([
            'nom' => 'Cuisine'
        ]);
        Interet::create([
            'nom' => 'Aviation'
        ]);
        Interet::create([
            'nom' => 'Mécanique'
        ]);
        Interet::create([
            'nom' => 'Licorne'
        ]);
    }
}
