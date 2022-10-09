<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::insert([
          [
              'name' => 'Director',
              'email' => 'director@gmail.com',
              'password' => Hash::make('12345678'),
              'role'   => 'director'
          ],
          [
              'name' => 'Manager',
              'email' => 'manager@gmail.com',
              'password' => Hash::make('12345678'),
              'role'   => 'manager'
          ],
            [
                'name' => 'Amandeep Manager',
                'email' => 'aman@manager.com',
                'password' => Hash::make('12345678'),
                'role'   => 'manager'
            ],
          [
              'name' => 'Shop Staff',
              'email' => 'staff@gmail.com',
              'password' => Hash::make('12345678'),
              'role'   => 'shop staff'
          ],
        ]);

    }
}
