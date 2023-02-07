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
                'name' => 'Director',
                'email' => 'user@director.com',
                'password' => Hash::make('123456789'),
                'role'   => 'director',
                'phone' => '12345678',
                'address' => 'Tas',
            ],
            [
                'name' => 'Manager',
                'email' => 'user@manager.com',
                'password' => Hash::make('123456789'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'Tas',
            ],

            [
                'name' => 'Manager User',
                'email' => 'user2@manager.com',
                'password' => Hash::make('123456789'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'Tas',
            ],
            [
                'name' => 'Manager 3',
                'email' => 'user3@manager.com',
                'password' => Hash::make('123456789'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'Tas',
            ],
            [
                'name' => 'Staff User',
                'email' => 'user@staff.com',
                'password' => Hash::make('123456789'),
                'role'   => 'shop_staff',
                'phone' => '12345678',
                'address' => 'Tas',
            ],
        ]);
    }
}
