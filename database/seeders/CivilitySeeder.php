<?php

namespace Database\Seeders;

use App\Models\Civility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Civility::truncate();
        DB::table('civilities')->insert(
          [ 'name' => "Monsieur","abbreviation"=>'Mr']
        );

        DB::table('civilities')->insert(
            [ 'name' => "Madame","abbreviation"=>'Mme']
        );

        DB::table('civilities')->insert(
            [ 'name' => "Mademoiselle","abbreviation"=>'Mdle']
        );
        DB::table('civilities')->insert(
            [ 'name' => "Docteur","abbreviation"=>'Dr']
        );
    }
}
