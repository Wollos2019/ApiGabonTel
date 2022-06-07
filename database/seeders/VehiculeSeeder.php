<?php

namespace Database\Seeders;


use App\Models\Vehicule\Vehicule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        Vehicule::truncate();
        DB::table('vehicules')->insert(
            [   'id'=>"1",
                'libelleVehicule'=>"Camry toyota",
                'numeroIdentifiant'=>"#75A3F3",
                'immatriculation'=>"Gb 125 nb ",
                'carteGrise'=>"gfhgj bgtekooll",
                'nombrePlace'=>"15",
                'longueurVehicule'=>"1548",
                'dureeVie'=>"25",
                'dateMiseCirculation'=>"2003-05-12",
                'delaiAlerte'=>"2",
                ]
        );
        DB::table('vehicules')->insert(
            [   'id'=>"2",
                'libelleVehicule'=>"Camry pajero",
                'numeroIdentifiant'=>"#73F3",
                'immatriculation'=>"Gb 002 mi ",
                'carteGrise'=>"demain bgtekooll",
                'nombrePlace'=>"5",
                'longueurVehicule'=>"148",
                'dureeVie'=>"25",
                'dateMiseCirculation'=>"2009-8-17",
                'delaiAlerte'=>"1",
            ]
        );
        DB::table('vehicules')->insert(
            ['id'=>"3",
                'libelleVehicule'=>" toyota",
                'numeroIdentifiant'=>"#75A3478",
                'immatriculation'=>"Gb 1251 hi ",
                'carteGrise'=>"salut bgtekooll",
                'nombrePlace'=>"10",
                'longueurVehicule'=>"154847",
                'dureeVie'=>"20",
                'dateMiseCirculation'=>"2008-05-14",
                'delaiAlerte'=>"3",
            ]
        );

    }
}
