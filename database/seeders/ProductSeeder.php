<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product=Product::create([
            'seller_id' => 1,
            'nombre' => 'Poro sudadera',
            'categoria' => 'Sudaderas',
            'descripcion' => 'Sudadera de poro',
            'precio' => 18.8,
            'cantidad' => 10,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
        $product=Product::create([
            'seller_id' => 1,
            'nombre' => 'Camiseta proyecto',
            'categoria' => 'Camisetas',
            'descripcion' => 'Camiseta de Ashe proyecto',
            'precio' => 20.50,
            'cantidad' => 1,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
        $product=Product::create([
            'seller_id' => 1,
            'nombre' => 'Toalla Grieta del Invocador',
            'categoria' => 'Toallas',
            'descripcion' => 'No se porque ni para que pero weno una toalla de la Grieta xD',
            'precio' => 1.00,
            'cantidad' => 20,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
        $product=Product::create([
            'seller_id' => 2,
            'nombre' => 'Funco pop de Chibi Ahri',
            'categoria' => 'Funco pops',
            'descripcion' => 'Una chibi Ahri de tft en su version Funko',
            'precio' => 100.99,
            'cantidad' => 9,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
        $product=Product::create([
            'seller_id' => 2,
            'nombre' => 'Poster de Evelyn Coven',
            'categoria' => 'Posters',
            'descripcion' => 'Un super poster de Evelyn Coven :D',
            'precio' => 15.00,
            'cantidad' => 30,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
        $product=Product::create([
            'seller_id' => 1,
            'nombre' => 'Sudadera de DJ Sona',
            'categoria' => 'Sudaderas',
            'descripcion' => 'Sudadera to wachi y 0% algodón de Sona',
            'precio' => 5.98,
            'cantidad' => 100,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
        $product=Product::create([
            'seller_id' => 1,
            'nombre' => 'Ashe Dragomancer',
            'categoria' => 'Funco Pops',
            'descripcion' => 'Chibi Ashe Dragomancer en version chibi xD',
            'precio' => 200,
            'cantidad' => 1,
        ]);
        $product->especificaciones()->create([
            'descripcion'=>'Prueba'
        ]);
    }
}
