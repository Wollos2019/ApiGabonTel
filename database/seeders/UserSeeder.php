<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('users')->insert(
            Array(
                'firstname' => "super",
                'lastname' => "Admin",
                'phone' => "237690088315",
                'email' => "fabrice@netafrica.com",
                'password' => bcrypt('GABONTV2022'),
                'status' => 'ENABLE',
                'isAdmin'=>1


            )
        );

    }
}
