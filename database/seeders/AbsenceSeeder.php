<?php

namespace Database\Seeders;

use App\Models\Absence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Absence::truncate();
        DB::table('absences')->insert(
            [ 'type'=>"Congé autorisé",'color'=>"#75A3F3"]
        );
        DB::table('absences')->insert(
            [ 'title' => "Mariage",'type'=>"Congé légal",'color'=>"#B7CA79"]

        );
        DB::table('absences')->insert(
            [ 'title' => "Mariage",'type'=>"Absence justifiée",'color'=>"#FFB6B8"]

        );
    }
}
