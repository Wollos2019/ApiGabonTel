<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        DB::table('settings')->insert(
            [ 'key' => "LEAVE_DELAI_AUTORISE",'description'=>"",'name'=>'']
        );
    }
}
