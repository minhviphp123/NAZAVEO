<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mouse;

class MouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mices = [
            [
                'name' => 'Logitech M100',
                'description' => 'Logitech M100 USB Mouse',
                'price' => 100000,
                'category_id' => 2,
            ],
            [
                'name' => 'Microsoft Wireless Mobile Mouse 1850',
                'description' => 'Microsoft Wireless Mobile Mouse 1850',
                'price' => 300000,
                'category_id' => 2,
            ],
            [
                'name' => 'Razer DeathAdder Elite',
                'description' => 'Razer DeathAdder Elite Gaming Mouse',
                'price' => 1390000,
                'category_id' => 2,
            ],
        ];

        foreach ($mices as $mouse) {
            Mouse::create($mouse);
        }
    }
}
