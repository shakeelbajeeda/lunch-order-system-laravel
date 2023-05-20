<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
           [
               'id' => 1,
               'name' => 'Service Manager',
               'email' => 'servicemanager@taget.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'service_manager',
               'address' => 'Hobart',
               'zone' => 'Hobart A',
           ],
           [
               'id' => 2,
               'name' => 'Taget Seller',
               'email' => 'seller@taget.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'seller',
               'address' => 'Hobart',
               'zone' => 'Hobart A',
           ],
           [
               'id' => 3,
               'name' => 'Taget Buyer',
               'email' => 'buyer@taget.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'buyer',
               'address' => 'Hobart',
               'zone' => 'Hobart A',
           ],
        ],['id', 'email']);
    }
}
