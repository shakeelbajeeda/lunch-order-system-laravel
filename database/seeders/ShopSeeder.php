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
                'name' => 'McLoons Lobster Shack',
                'owner' => 'Puja',
            ],
            [
                'name' => 'Chaco Bar',
                'owner' => 'Khushbuben',
            ],
            [
                'name' => 'Grossi Florentino',
                'owner' => 'Bindiya',
            ],
        ]);
    }
}
