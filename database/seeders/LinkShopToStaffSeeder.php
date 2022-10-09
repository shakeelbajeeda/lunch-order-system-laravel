<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LinkShopToStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_products')->insert([

            [
                'shop_id' => 1,
                'product_id' => 1,
            ],

            [
                'shop_id' => 1,
                'product_id' => 2,
            ],

            [
                'shop_id' => 1,
                'product_id' => 3,
            ],

            [
                'shop_id' => 2,
                'product_id' => 4,
            ],

            [
                'shop_id' => 2,
                'product_id' => 5,
            ],

            [
                'shop_id' => 2,
                'product_id' => 1,
            ],

            [
                'shop_id' => 2,
                'product_id' => 6,
            ],

            [
                'shop_id' => 2,
                'product_id' => 1,
            ],

            [
                'shop_id' => 3,
                'product_id' => 7,
            ],

            [
                'shop_id' => 3,
                'product_id' => 8,
            ],

            [
                'shop_id' => 3,
                'product_id' => 9,
            ],

            [
                'shop_id' => 4,
                'product_id' => 10,
            ],

            [
                'shop_id' => 4,
                'product_id' => 11,
            ],

            [
                'shop_id' => 4,
                'product_id' => 12,
            ],

            [
                'shop_id' => 4,
                'product_id' => 1,
            ],

            [
                'shop_id' => 4,
                'product_id' => 5,
            ],

            [
                'shop_id' => 4,
                'product_id' => 6,
            ]
        ]);
    }
}
