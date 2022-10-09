<?php

namespace Database\Seeders;

use App\Models\ShopProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddProductsToMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopProduct::create([
            'product_id' => 1,
            'shop_id' => 1
        ]);

        ShopProduct::create([
            'product_id' => 2,
            'shop_id' => 1
        ]);

        ShopProduct::create([
            'product_id' => 3,
            'shop_id' => 1
        ]);

        ShopProduct::create([
            'product_id' => 1,
            'shop_id' => 2
        ]);

        ShopProduct::create([
            'product_id' => 3,
            'shop_id' => 2
        ]);

        ShopProduct::create([
            'product_id' => 4,
            'shop_id' => 2
        ]);

        ShopProduct::create([
            'product_id' => 3,
            'shop_id' => 3
        ]);

        ShopProduct::create([
            'product_id' => 4,
            'shop_id' => 3
        ]);

        ShopProduct::create([
            'product_id' => 5,
            'shop_id' => 3
        ]);

        ShopProduct::create([
            'product_id' => 6,
            'shop_id' => 3
        ]);

        ShopProduct::create([
            'product_id' => 7,
            'shop_id' => 3
        ]);

        ShopProduct::create([
            'product_id' => 8,
            'shop_id' => 3
        ]);

    }
}
