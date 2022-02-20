<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session::truncate();
        DB::table('sessions')->insert(
            [ 'year' => "2022",'status'=>'PENDING']
        );
    }
}
