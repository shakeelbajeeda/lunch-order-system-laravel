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
        User::upsert([
           [
               'id' => 1,
               'name' => 'Service Manager',
               'email' => 'divya@servicemanager.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'service_manager',
               'address' => 'Hobart',
               'zone' => 'A',
           ],
           [
               'id' => 2,
               'name' => 'Aukins Seller',
               'email' => 'aukins@seller.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'seller',
               'address' => 'Hobart',
               'zone' => 'A',
           ],
           [
               'id' => 3,
               'name' => 'Gayani Buyer',
               'email' => 'gayani@buyer.com',
               'password' => Hash::make('12345678'),
               'user_type' => 'buyer',
               'address' => 'Hobart',
               'zone' => 'A',
           ],
            [
                'id' => 4,
                'name' => 'Ramandeep Buyer',
                'email' => 'ramandeep@buyer.com',
                'password' => Hash::make('12345678'),
                'user_type' => 'buyer',
                'address' => 'Hobart',
                'zone' => 'A',
            ],
        ],['id', 'email']);
    }
}
