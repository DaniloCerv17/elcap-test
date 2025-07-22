<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Comidas',
            'slug' => 'comidas',

        ]);

        
        Categoria::create([
            'nombre' => 'Bebidas',
            'slug' => 'bebidas',

        ]);

        
        Categoria::create([
            'nombre' => 'Shots',
            'slug' => 'shots',

        ]);

        
        Categoria::create([
            'nombre' => 'Temporada',
            'slug' => 'temporada',

        ]);
    }
}
