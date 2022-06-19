<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Contract::truncate();
        DB::table('contracts')->insert(
            [ 'name' => "Stageaire academy",'test'=>0,"term"=>2, "termMeasure"=>"s"]
        );
        DB::table('contracts')->insert(
            [ 'name' => "cdd",'test'=>1,"term"=>3, "termMeasure"=>"m"]
        );
        DB::table('contracts')->insert(
            [ 'name' => "CDI",'test'=>0,"term"=>0, "termMeasure"=>"y"]
        );
    }
}
