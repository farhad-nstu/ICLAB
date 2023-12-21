<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
            0 => [
                'name' => 'Watch',
                'status' => 1,
            ],
            1 => [
                'name' => 'Mobile',
                'status' => 1,
            ],
            2 => [
                'name' => 'Laptop',
                'status' => 1
            ],
            3 => [
                'name' => 'Macbook Laptop',
                'status' => 1
            ],
            4 => [
                'name' => 'Smart Watch',
                'status' => 1
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
