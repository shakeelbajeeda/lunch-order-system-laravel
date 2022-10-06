<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->upsert([
            [
                'title' => 'XS Espresso - Wetherill Park, Sydney',
                'price' => 25,
                'description' => 'XS Espresso - Wetherill Park, Sydney',
                'image' => 'images/products/1.jpg',
            ],
            [
                'title' => 'Easy Chicken Tacos Recipe',
                'price' => 256,
                'description' => 'Easy Chicken Tacos Recipe',
                'image' => 'images/products/2.jpg',
            ],
            [
                'title' => 'Spicy Miso Chicken Wings with Japanese Potato Salad',
                'price' => 399,
                'description' => 'Spicy Miso Chicken Wings with Japanese Potato Salad',
                'image' => 'images/products/3.jpg',
            ],
            [
                'title' => 'Five-Spice Chicken with Broccolini',
                'price' => 249,
                'description' => 'Five-Spice Chicken with Broccolini',
                'image' => 'images/products/4.jpg',
            ],
            [
                'title' => ' Milk Cafe - Ashgrove, Brisbane',
                'price' => 99,
                'description' => ' Milk Cafe - Ashgrove, Brisbane',
                'image' => 'images/products/5.jpg',
            ],
            [
                'title' => ' Butter Chicken Pie',
                'price' => 199,
                'description' => 'Butter Chicken Pie',
                'image' => 'images/products/6.jpg',
            ],
            [
                'title' => 'Chicken Burger',
                'price' => 20,
                'description' => 'Butter Chicken Burger',
                'image' => 'images/products/9.jpg',
            ],
            [
                'title' => 'Chicken Burger & Fairies',
                'price' => 35,
                'description' => 'Butter Chicken Burger & Fairies',
                'image' => 'images/products/10.jpg',
            ],
            [
                'title' => 'Debonairs Pizza ',
                'price' => 119,
                'description' => 'Debonairs Pizza ',
                'image' => 'images/products/14.jpg',
            ],
        ],['title', 'price', 'description', 'image']);
    }
}
