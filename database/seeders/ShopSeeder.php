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
              'name' => 'Luz Restaurant',
              'owner' => 'Peter Gilmore',
           ],
           [
              'name' => 'Dier Makr',
              'owner' => 'Gilmore',
           ],
           [
              'name' => 'Mudbar Restaurant',
              'owner' => 'Gilmore',
           ],
        ]);
    }
}
