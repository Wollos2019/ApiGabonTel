<?php

namespace Database\Seeders;

use App\Models\Fonction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  Fonction::truncate();
        DB::table('fonctions')->insert(
            [ 'name' => "Developpeur"]
        );
        DB::table('fonctions')->insert(
            [ 'name' => "Journaliste"]
        );
    }
}
