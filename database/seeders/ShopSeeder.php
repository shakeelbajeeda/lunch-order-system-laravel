<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aus_shops')->insert([
            [
                'name' => 'Daily Lunch Specials',
                'owner' => 'Timi',
            ],
            [
                'name' => 'Food & Drink Shop',
                'owner' => 'Wang Jinzhang',
            ],
            [
                'name' => 'Coco Cubano',
                'owner' => 'Xu Wenzhou',
            ],
        ]);
    }
}
