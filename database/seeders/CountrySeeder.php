<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();
        DB::table('countries')->insert(
            [
                'name' => "GABON",
                'abbreviation1'=>'GAB',
                'abbreviation2'=>'GA',
                'codePhone'=>'241',
                'code'=>'266'

            ]
        );
    }
}
