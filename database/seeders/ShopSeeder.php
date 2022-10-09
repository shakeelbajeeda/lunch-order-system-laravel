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
        DB::table('shops')->insert([
            [
                'name' => 'Bucking Bull',
                'owner' => 'Poonam',
            ],
            [
                'name' => 'Burger Fuel',
                'owner' => 'Poonam',
            ],
            [
                'name' => 'KFC',
                'owner' => 'Poonam',
            ],
        ]);
    }
}
