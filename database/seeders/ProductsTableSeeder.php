<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Products::create([
                'name' => 'Product ' . $i,
                'description' => 'Description for Product ' . $i,
                'price' => rand(10, 1000),
                // 'thumb' => 'https://example.com/product' . $i . '.jpg',
                'child_id' => 10
            ]);
        }
    }
}
