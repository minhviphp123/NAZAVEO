<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phones = [
            [
                'name' => 'iPhone 12 Pro Max',
                'description' => 'iPhone 12 Pro Max 128GB',
                'price' => 32990000,
                'category_id' => 1,
            ],
            [
                'name' => 'Samsung Galaxy S21 Ultra',
                'description' => 'Samsung Galaxy S21 Ultra 5G 256GB',
                'price' => 30990000,
                'category_id' => 1,
            ],
            [
                'name' => 'Xiaomi Mi 11',
                'description' => 'Xiaomi Mi 11 5G 128GB',
                'price' => 15990000,
                'category_id' => 1,
            ],
            [
                'name' => 'iPad Pro 12.9 inch',
                'description' => 'iPad Pro 12.9 inch Wi-Fi 256GB',
                'price' => 30990000,
                'category_id' => 2,
            ],
            [
                'name' => 'Samsung Galaxy Tab S7+',
                'description' => 'Samsung Galaxy Tab S7+ Wi-Fi 128GB',
                'price' => 20990000,
                'category_id' => 2,
            ],
        ];

        foreach ($phones as $phone) {
            Phone::create($phone);
        }
    }
}
