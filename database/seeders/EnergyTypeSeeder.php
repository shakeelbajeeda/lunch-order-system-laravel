<?php

namespace Database\Seeders;

use App\Models\MarketPrice;
use App\Models\RenewableEnergyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnergyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RenewableEnergyType::upsert([
           array('id' => 1, 'energy_type' => 'Solar', 'market_price' => 15, 'administration_fee' => 5, 'tax' => 2),
           array('id' => 2, 'energy_type' => 'Wind', 'market_price' => 25, 'administration_fee' => 7, 'tax' => 3),
           array('id' => 3, 'energy_type' => 'Both', 'market_price' => 35, 'administration_fee' => 8, 'tax' => 6),
        ],['id']);

        MarketPrice::upsert([
           array('id' => 1, 'energy_type' => 'Solar', 'market_price' => 15, 'administration_fee' => 5, 'tax' => 2),
           array('id' => 2, 'energy_type' => 'Wind', 'market_price' => 25, 'administration_fee' => 7, 'tax' => 3),
           array('id' => 3, 'energy_type' => 'Both', 'market_price' => 35, 'administration_fee' => 8, 'tax' => 6),
        ],['id']);
    }
}
