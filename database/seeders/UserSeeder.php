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
               'name' => 'Atif Service Manager',
               'email' => 'atif@servicemanager.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'service_manager',
               'address' => 'Hobart',
               'zone' => 'Hobart A',
           ],
           [
               'id' => 2,
               'name' => 'Atif Seller',
               'email' => 'atif@seller.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'seller',
               'address' => 'Hobart',
               'zone' => 'Hobart A',
           ],
           [
               'id' => 3,
               'name' => 'Atif Buyer',
               'email' => 'atif@buyer.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'buyer',
               'address' => 'Hobart',
               'zone' => 'Hobart A',
           ],
        ],['id', 'email']);
    }
}
