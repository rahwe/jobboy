<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shift;
class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = [
            ['name' => 'Full time'],
            ['name' => 'Part time'],
            ['name' => 'Contract'],
            ['name' => "Temporary"],
            ['name' => "Internship"]
        ];

       foreach ($shifts as $shift) {
            Shift::create($shift);
       }
    }
}
