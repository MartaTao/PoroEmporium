<?php

namespace Database\Seeders;

use App\Models\Categorie\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create([
            'nombre'=>'Camisetas',
        ]);
        Categorie::create([
            'nombre'=>'Figuritas',
        ]);
        Categorie::create([
            'nombre'=>'Funco Pops',
        ]);
        Categorie::create([
            'nombre'=>'Posters',
        ]);
        Categorie::create([
            'nombre'=>'Sudaderas',
        ]);
        Categorie::create([
            'nombre'=>'Toallas',
        ]);
    }
}
