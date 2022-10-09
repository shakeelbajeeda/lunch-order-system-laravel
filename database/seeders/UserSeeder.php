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
                'name' => 'Poonam Director',
                'email' => 'poonam@director.com',
                'password' => Hash::make('password'),
                'role'   => 'director',
                'phone' => '12345678',
                'address' => 'UTAS',
            ],
            [
                'name' => 'Manager',
                'email' => 'poonam@manager.com',
                'password' => Hash::make('password'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'UTAS',
            ],

            [
                'name' => 'Manager User2',
                'email' => 'manager@manager.com',
                'password' => Hash::make('password'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'UTAS',
            ],
            [
                'name' => 'Staff User',
                'email' => 'poonam@staff.com',
                'password' => Hash::make('password'),
                'role'   => 'shop_staff',
                'phone' => '12345678',
                'address' => 'UTAS',
            ],
        ]);
    }
}
