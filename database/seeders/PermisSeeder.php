<?php

namespace Database\Seeders;


use App\Models\Vehicule\Permit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permit::truncate();
//        DB::table('permits')->insert(
//            [   'id'=>"1",
//                'numeroPermis'=>" 14796gtd",
//                'dateAcquisition'=>"2003-05-12",
//                'userId'=>"0",
//            ]
//        );
//        DB::table('permits')->insert(
//            [   'id'=>"2",
//                'numeroPermis'=>"455656 mutsibushi",
//                'dateAcquisition'=>"2014-05-11",
//                'userId'=>"1",
//            ]
//        );
//        DB::table('permits')->insert(
//            [   'id'=>"3",
//                'numeroPermis'=>"14789 corrolla",
//                'dateAcquisition'=>"2007-07-12",
//                'userId'=>"2",
//            ]
//        );
//        DB::table('permits')->insert(
//            [   'id'=>"4",
//                'numeroPermis'=>"pajero 15478",
//                'dateAcquisition'=>"2002-05-12",
//                'userId'=>"5",
//            ]
//        );
//        DB::table('permits')->insert(
//            [   'id'=>"5",
//                'numeroPermis'=>"Camry toyota",
//                'dateAcquisition'=>"2003-05-12",
//                'userId'=>"6",
//            ]
//        );
    }
}
