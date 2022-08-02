<?php

namespace Database\Seeders;


use App\Models\Vehicule\PriseVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriseVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PriseVehicule::truncate();
        DB::table('prise_vehicules')->insert(
            [   'id'=>"1",
                'objetPriseVehicule'=>"lorem ipsum loren betreh",
                'datePriseVehicule'=>"2021-10-08",
                'heurePriseVehicule'=>"08:20:15",
                'idVehicule'=>"1"

            ]
        );
        DB::table('prise_vehicules')->insert(
            [   'id'=>"2",
                'objetPriseVehicule'=>"lorem ipsum loren betreh",
                'datePriseVehicule'=>"2001-02-03",
                'heurePriseVehicule'=>"14:20:15",
                'idVehicule'=>"2"

            ]
        );
        DB::table('prise_vehicules')->insert(
            [   'id'=>"3",
                'objetPriseVehicule'=>"lorem ipsum loren betreh",
                'datePriseVehicule'=>"2003-11-06",
                'heurePriseVehicule'=>"17:45:15",
                'idVehicule'=>"3"
            ]
        );
    }
}
