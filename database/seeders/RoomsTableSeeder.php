<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rooms')->insert([
                'name' => 'Phòng ' . $i,
                'price' => rand(100, 500),
                'description' => 'Mô tả phòng số ' . $i,
                'booking' => rand(1, 10),
                'check_in_date' => now(),
                'check_out_date' => now()->addDays(rand(1, 7))
            ]);
        }
    }
}
