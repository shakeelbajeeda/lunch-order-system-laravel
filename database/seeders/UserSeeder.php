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
               'email' => 'nagothu@utas.com',
               'password' => Hash::make('nagothu'),
               'user_type' => 'service_manager',
               'address' => 'Hobart',
               'zone' => 'A',
           ],
           [
               'id' => 2,
               'name' => 'Thalla Vamshikrishna Seller',
               'email' => 'thalla@utas.com',
               'password' => Hash::make('thalla'),
               'user_type' => 'seller',
               'address' => 'Hobart',
               'zone' => 'A',
           ],
           [
               'id' => 3,
               'name' => 'Nerella Naveena Buyer',
               'email' => 'nerella@buyer.com',
               'password' => Hash::make('nerella'),
               'user_type' => 'buyer',
               'address' => 'Hobart',
               'zone' => 'A',
           ],
            [
                'id' => 4,
                'name' => 'Amaram Sampath Reddy',
                'email' => 'amaram@buyer.com',
                'password' => Hash::make('amaram'),
                'user_type' => 'buyer',
                'address' => 'Hobart',
                'zone' => 'A',
            ],
        ],['id']);
    }
}
