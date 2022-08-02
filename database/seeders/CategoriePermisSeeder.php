<?php

namespace Database\Seeders;

use App\Models\Vehicule\CategoryPermit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriePermisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CategoryPermit::truncate();
        DB::table('category_permits')->insert(
            [   'id'=>"1",
                'libelle'=>"type A",

            ]
        );
        DB::table('category_permits')->insert(
            [   'id'=>"2",
                'libelle'=>"type AB",

            ]
        );
        DB::table('category_permits')->insert(
            [   'id'=>"3",
                'libelle'=>"type ABC",

            ]
        );
        DB::table('category_permits')->insert(
            [   'id'=>"4",
                'libelle'=>" type ABCD",

            ]
        );
        DB::table('category_permits')->insert(
            [   'id'=>"5",
                'libelle'=>"type ABCDE ",

            ]
        );
    }
}
