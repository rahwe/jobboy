<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'IT(Information Technology)'],
            ['name' => 'HR(Human Resource)'],
            ['name' => 'Accounting'],
            ['name' => "Banking"]
        ];

       foreach ($categories as $category) {
           Category::create($category);
       }
    }
}
