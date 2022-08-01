<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        DB::table('products')->insert(
            ['name' => 'Spot publicatiare', 
            'description' => 'Petite publicité',
            'price' => '45000']
        );
        DB::table('products')->insert(
            ['name' => 'Passage au JT',
            'description' => 'Passage sur le plateau du JT',
            'price' => '100000']
        );
        DB::table('products')->insert(
            ['name' => 'Bande déroulante',
            'description' => 'Publicité écrite défilante',
            'price' => '25000']
        );
    }
}
