<?php

namespace Database\Seeders;

use App\Models\Assurance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assurance::truncate();
            DB::table('assurances')->insert(
                [   'id'=>"1",
                    'numeroPoliceAssurance'=>"NhgrhGGRlkj120",
                    'dateDebutAssurance'=>"1991-12-02",
                    'dateFinAssurance'=>"2015-2-02",
                    'scanAssurance'=>"fdfdfdsfsdfsdf",
                    'idVehicule'=>"1"



            ]
            );
        DB::table('assurances')->insert(
            [   'id'=>"2",
                'numeroPoliceAssurance'=>"NhgrhGGRlkj120",
                'dateDebutAssurance'=>"1993-12-02",
                'dateFinAssurance'=>"2017-2-02",
                'scanAssurance'=>"ferfgtyuio",
                'idVehicule'=>"2"


            ]
        );
        DB::table('assurances')->insert(
            [   'id'=>"3",
                'numeroPoliceAssurance'=>"NhgrhGGRlkj120",
                'dateDebutAssurance'=>"1996-11-02",
                'dateFinAssurance'=>"2019-12-02",
                'scanAssurance'=>"fodihgjkppertf",
                'idVehicule'=>"3"


            ]
        );

    }
}
