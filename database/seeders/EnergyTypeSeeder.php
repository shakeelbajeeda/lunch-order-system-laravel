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
           array('id' => 1, 'energy_type' => 'Solar', 'market_price' => 30, 'administration_fee' => 9, 'tax' => 5),
           array('id' => 2, 'energy_type' => 'Wind', 'market_price' => 40, 'administration_fee' => 10, 'tax' => 6),
           array('id' => 3, 'energy_type' => 'Both', 'market_price' => 60, 'administration_fee' => 12, 'tax' => 9),
        ],['id']);

        MarketPrice::upsert([
            array('id' => 1, 'energy_type' => 'Solar', 'market_price' => 30, 'administration_fee' => 9, 'tax' => 5),
            array('id' => 2, 'energy_type' => 'Wind', 'market_price' => 40, 'administration_fee' => 10, 'tax' => 6),
            array('id' => 3, 'energy_type' => 'Both', 'market_price' => 60, 'administration_fee' => 12, 'tax' => 9),
        ],['id']);
    }
}
