<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            0 => [
                'name' => 'Apple Watch',
                'category_id' => 1,
                'price' => 2000,
                'discount' => 10,
                'status' => 'In Stock',
            ],
            1 => [
                'name' => 'Xiomi Mobile',
                'category_id' => 2,
                'price' => 20000,
                'discount' => 10,
                'status' => 'In Stock',
            ],
            2 => [
                'name' => 'Laptop',
                'category_id' => 3,
                'price' => 2000,
                'discount' => 10,
                'status' => 'In Stock',
            ],
            3 => [
                'name' => 'Macbook Laptop',
                'category_id' => 1,
                'price' => 200,
                'discount' => 10,
                'status' => 'In Stock',
            ],
            4 => [
                'name' => 'Smart Watch',
                'category_id' => 1,
                'price' => 200,
                'discount' => 10,
                'status' => 'In Stock',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
