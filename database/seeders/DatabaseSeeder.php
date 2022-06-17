<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();

               //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //DB::statement('SET session_replication_role = \'replica\';');
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
       // App\User::truncate();
       // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([
            WorkingDaySeeder::class,
            UserSeeder::class,
            CivilitySeeder::class,
            CountrySeeder::class,
            SessionSeeder::class,
            AbsenceSeeder::class,
            DepartmentSeeder::class,
            ContractSeeder::class,
            FonctionSeeder::class,
            VehiculeSeeder::class,
            AbsenceSeeder::class,
            PriseVehiculeSeeder::class,
            AssuranceSeeder::class,
            PermisSeeder::class,
            CategoriePermisSeeder::class,
            PermisCategorieSeeder::class,


        ]);
    }
}
