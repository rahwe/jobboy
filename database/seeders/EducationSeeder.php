<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education = [
            ['name' => 'No Limitation'],
            ['name' => 'High School'],
            ['name' => 'Associate Degree'],
            ['name' => "Bachelor Degree"],
            ['name' => "Master Degree"],
            ['name' => "Professional Degree"],
            ['name' => "Doctor Degree"],
            ['name' => "Other"]
        ];

       foreach ($education as $ed) {
           Education::create($ed);
       }
    }
}
