<?php

namespace Database\Seeders;

use App\Models\ShopWorker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignShopToStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopWorker::create([
            "shop_id" => 1,
            "user_id" => 2
        ]);
        ShopWorker::create([
            "shop_id" => 2,
            "user_id" => 3
        ]);
        ShopWorker::create([
            "shop_id" => 3,
            "user_id" => 4
        ]);
    }
}
