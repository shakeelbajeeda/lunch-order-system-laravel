<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkProductToShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_managers')->insert([

            [
                'shop_id' => 1,
                'user_id' => 2,
            ],

            [
                'shop_id' => 2,
                'user_id' => 3,
            ],

            [
                'shop_id' => 3,
                'user_id' => 4,
            ],
        ]);
    }
}
