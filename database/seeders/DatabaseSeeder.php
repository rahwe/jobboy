<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(SalarySeeder::class);
        $this->call(LocationSeeder::class);
        
    }
}
