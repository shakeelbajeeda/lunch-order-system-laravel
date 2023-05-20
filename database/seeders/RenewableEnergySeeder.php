<?php

namespace Database\Seeders;

use App\Models\RenewableEnergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RenewableEnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RenewableEnergy::upsert([
            array('id' => 1, 'user_id' => 2, 'renewable_energy_type_id' => 1, 'volume' => 60, 'price' => 16),
            array('id' => 2, 'user_id' => 2, 'renewable_energy_type_id' => 2, 'volume' => 85, 'price' => 23),
            array('id' => 3, 'user_id' => 2, 'renewable_energy_type_id' => 3, 'volume' => 105, 'price' => 35),
        ], ['id']);
    }
}
