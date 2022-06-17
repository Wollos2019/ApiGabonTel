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
                'email' => "admin@gabontv.com",
                'password' => bcrypt('GABONTV2022'),
                'status' => 'ENABLE',
                'isAdmin'=>1


            )
        );
        DB::table('users')->insert(
            Array(

                'firstname' => "manager",
                'lastname' => "manger",
                'email' => "manager@gabontv.com",
                'password' => bcrypt('1234'),
                'status' => 'ENABLE',
                'isAdmin'=>0


            )
        );
        DB::table('users')->insert(
            Array(

                'firstname' => "supervisor",
                'lastname' => "supervisor",
                'email' => "supervisor@gabontv.com",
                'password' => bcrypt('12345'),
                'status' => 'ENABLE',
                'isAdmin'=>0


            )
        );
        DB::table('users')->insert(
            Array(

                'firstname' => "top manager",
                'lastname' => "top manager",
                'email' => "top@gabontv.com",
                'password' => bcrypt('012345'),
                'status' => 'ENABLE',
                'isAdmin'=>0


            )
        );

    }
}
