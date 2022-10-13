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
                'name' => 'Bucking Bull',
                'owner' => 'Timi',
            ],
            [
                'name' => 'Burger Fuel',
                'owner' => 'Timi',
            ],
            [
                'name' => 'KFC',
                'owner' => 'Timi',
            ],
        ]);
    }
}
