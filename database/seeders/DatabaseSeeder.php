<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            MasterPackageTableSeeder::class,
            StateTableSeeder::class,
            CityTableSeeder::class,
            CountryTableSeeder::class,
        ]);
    }
}
