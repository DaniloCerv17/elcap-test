<?php

namespace Database\Seeders;

use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategoria::create([
            'nombre' => 'Pescados',
            'slug' => 'pescados',
            'id_categoria' => 1,
        ]);

        SubCategoria::create([
            'nombre' => 'Camaron',
            'slug' => 'camaron',
            'id_categoria' => 1,
        ]);
        SubCategoria::create([
            'nombre' => 'Cerveza',
            'slug' => 'cerveza',
            'id_categoria' => 2,
        ]);
          SubCategoria::create([
            'nombre' => 'Refresco',
            'slug' => 'refresco',
            'id_categoria' => 2,
        ]);
          SubCategoria::create([
            'nombre' => 'Tequila',
            'slug' => 'tequila',
            'id_categoria' => 3,
        ]);
          SubCategoria::create([
            'nombre' => 'Whiskey',
            'slug' => 'whiskey',
            'id_categoria' => 3,
        ]);
          SubCategoria::create([
            'nombre' => 'Langosta',
            'slug' => 'langosta',
            'id_categoria' => 4,
        ]);
          SubCategoria::create([
            'nombre' => 'Pulpo',
            'slug' => 'pulpo',
            'id_categoria' => 4,
        ]);

    }
}
