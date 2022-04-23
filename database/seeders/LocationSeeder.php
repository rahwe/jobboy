<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [

            ['name' => 'Banteay Meanchey'],
            ['name' => 'Battambang'],
            ['name' => 'Kampong Cham'],
            ['name' => "Kampong Chhnang"],
            ['name' => "Kampong Speu"],

            ['name' => 'Kampong Thom'],
            ['name' => 'Kampot'],
            ['name' => 'Kandal'],
            ['name' => "Koh Kong"],
            ['name' => "Kratié"],

            ['name' => 'Mondulkiri'],
            ['name' => 'Phnom Penh'],
            ['name' => 'Prey Veng'],
            ['name' => "Pursat"],
            ['name' => "Ratanakiri"],

            ['name' => 'Siem Reap'],
            ['name' => 'Preah Sihanouk'],
            ['name' => 'Stung Treng'],
            ['name' => "Svay Rieng"],
            ['name' => "Takéo"],

            ['name' => 'Oddar Meanchey'],
            ['name' => 'Kep'],
            ['name' => 'Pailin'],
            ['name' => "Tboung Khmum"]

        ];

       foreach ($locations as $location) {
            Location::create($location);
       }
    }
}
