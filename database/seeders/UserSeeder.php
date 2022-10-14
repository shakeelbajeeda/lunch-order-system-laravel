<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name' => 'Bindiya',
                'email' => 'bindiya@director.com',
                'password' => Hash::make('bindiya'),
                'role'   => 'director',
                'phone' => '3423432423',
                'address' => 'UTAS',
            ],
            [
                'name' => 'Puja Tiwari',
                'email' => 'puja@manager.com',
                'password' => Hash::make('puja123'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'TAS',
            ],

            [
                'name' => 'Khushbuben Patel',
                'email' => 'khushbuben@manager.com',
                'password' => Hash::make('khushbuben'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'TAS',
            ],
            [
                'name' => 'Puja Staff',
                'email' => 'puja@staff.com',
                'password' => Hash::make('puja123'),
                'role'   => 'shop_staff',
                'phone' => '12345678',
                'address' => 'TAS',
            ],
        ]);
    }
}
