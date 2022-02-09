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
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'tuesday',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'wednesday',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'thursday',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'friday',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'saturday',
                'status'=>1

            )
        );

        DB::table('working_days')->insert(
            Array(
                'day' =>'sunday',
                'status'=>0

            )
        );
    }
}
