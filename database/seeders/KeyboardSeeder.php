<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Keyboard;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keyboards = [
            [
                'name' => 'Logitech K120',
                'description' => 'Logitech K120 USB Keyboard',
                'price' => 150000,
                'category_id' => 3,
            ],
            [
                'name' => 'Microsoft Wireless Desktop 900',
                'description' => 'Microsoft Wireless Desktop 900 Combo',
                'price' => 600000,
                'category_id' => 3,
            ],
            [
                'name' => 'Razer Huntsman Elite',
                'description' => 'Razer Huntsman Elite Gaming Keyboard',
                'price' => 3490000,
                'category_id' => 3,
            ],
        ];

        foreach ($keyboards as $keyboard) {
            Keyboard::create($keyboard);
        }
    }
}
