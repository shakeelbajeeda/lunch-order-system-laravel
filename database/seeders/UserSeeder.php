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
                'name' => 'Director Timi',
                'email' => 'timi@director.com',
                'password' => Hash::make('timi123'),
                'role'   => 'director',
                'phone' => '+1231232',
                'address' => 'UTAS',
            ],
            [
                'name' => 'Manager Timi',
                'email' => 'timi@manager.com',
                'password' => Hash::make('timi123'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'TAS',
            ],

            [
                'name' => 'Wang Jinzhang Manager',
                'email' => 'wang@manager.com',
                'password' => Hash::make('wang123'),
                'role'   => 'manager',
                'phone' => '12345678',
                'address' => 'TAS',
            ],
            [
                'name' => 'Xu Wenzhou Shop Staff',
                'email' => 'wenzhou@staff.com',
                'password' => Hash::make('wenzhou123'),
                'role'   => 'shop_staff',
                'phone' => '12345678',
                'address' => 'TAS',
            ],
        ]);
    }
}
