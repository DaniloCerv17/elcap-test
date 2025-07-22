<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Camaron Empanizado',
            'precio' => 170,
            'descripcion' =>'Contiene: Tomate, cebollas, lechiga, cebolla, arro...',
            // 'imagen' => 'img/camaron_empanizado.jpg',
            'slug' => 'camaron-empanizado',
            'id_sub_categoria' => 1,
        ]);
        Producto::create([
            'nombre' => 'Tecate',
            'precio' => 170,
            'descripcion' =>'Contiene: vaso con hielo',
            // 'imagen' => 'img/camaron_empanizado.jpg',
            'slug' => 'tecate',
            'id_sub_categoria' => 3,
        ]);
        Producto::create([
            'nombre' => 'Tequila',
            'precio' => 170,
            'descripcion' =>'Contiene: vaso pequeño',
            // 'imagen' => 'img/camaron_empanizado.jpg',
            'slug' => 'tequila',
            'id_sub_categoria' => 5,
        ]);
        Producto::create([
            'nombre' => 'Langosta',
            'precio' => 170,
            'descripcion' =>'Contiene: Tomate, cebollas, lechiga, cebolla, arro...',
            // 'imagen' => 'img/camaron_empanizado.jpg',
            'slug' => 'langosta',
            'id_sub_categoria' => 7,
        ]);
    }
}
