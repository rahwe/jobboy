<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salary;
class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaries = [
            ['name' => '<$200'],
            ['name' => '$200->$500'],
            ['name' => '$500->$999'],
            ['name' => "$1000->$2000"],
            ['name' => "Negotiatble"]
        ];

       foreach ($salaries as $salary) {
            Salary::create($salary);
       }
    }
}
