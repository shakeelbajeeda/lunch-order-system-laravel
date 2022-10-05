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
           'name' => 'Shakeel Ahmad',
           'email' => 'meharshakeel9114@gmail.com',
           'password' => Hash::make('12345678'),
            'role'   => 'director'
        ]);
    }
}
