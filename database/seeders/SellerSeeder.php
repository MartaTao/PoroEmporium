<?php

namespace Database\Seeders;

use App\Models\Seller\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::create([
            'nombre'=>'LolIsMyPassion',
            'email'=>'roadToPlatino@lol.com',
        ]);
        Seller::create([
            'nombre'=>'YasuoManco',
            'email'=>'noobConYasuo@lol.com',
        ]);
    }
}
