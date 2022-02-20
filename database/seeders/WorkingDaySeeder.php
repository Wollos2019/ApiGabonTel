<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dateD=  $dateA=Carbon::now();

        DB::table('working_days')->insert(
            Array(
                'day' =>'monday',
                'name'=>'Lundi',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'tuesday',
                'name'=>'Mardi',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'wednesday',
                'name'=>'Mercredi',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'thursday',
                'name'=>'Jeudi',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'friday',
                'name'=>'Vendredi',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'saturday',
                'name'=>'Samedi',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'sunday',
                'name'=>'Dimanche',
                'status'=>0

            )
        );
    }
}
