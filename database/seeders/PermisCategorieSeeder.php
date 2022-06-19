<?php

namespace Database\Seeders;

use App\Models\Vehicule\PermisCategorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // PermisCategorie::truncate();
        DB::table('permit_category')->insert(
            [   'id'=>"1",
                'numeroDossierPermis'=>" GB 000124",
                'typeCategoriePermis'=>"A3F3",
                'dateDebutPermis'=>"2003-05-12",
                'dateFinPermis'=>"2013-05-12",
                'permit_Id'=>"1",
                'category_permit_id'=>"1"

            ]
        );
        DB::table('permit_category')->insert(
            [   'id'=>"2",
                'numeroDossierPermis'=>" GB 0124",
                'typeCategoriePermis'=>"A3F444",
                'dateDebutPermis'=>"2017-05-12",
                'dateFinPermis'=>"2023-05-12",
                'permit_Id'=>"2",
                'category_permit_id'=>"2"

            ]
        );
        DB::table('permit_category')->insert(
            [   'id'=>"3",
                'numeroDossierPermis'=>" GB 124",
                'typeCategoriePermis'=>"AF3",
                'dateDebutPermis'=>"2020-05-12",
                'dateFinPermis'=>"2027-05-12",
                'permit_Id'=>"1",
                'category_permit_id'=>"2"

            ]
        );
        DB::table('permit_category')->insert(
            [   'id'=>"4",
                'numeroDossierPermis'=>" 124 VFR",
                'typeCategoriePermis'=>"AAAAA",
                'dateDebutPermis'=>"2012-05-12",
                'dateFinPermis'=>"2023-05-12",
                'permit_Id'=>"2",
                'category_permit_id'=>"3"

            ]
        );
    }
}
