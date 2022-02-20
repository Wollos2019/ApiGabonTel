<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();
        DB::table('departments')->insert(
            [ 'name' => "Informatique"]
        );

        DB::table('departments')->insert(
            [ 'name' => "Commercial"]
        );
    }
}
