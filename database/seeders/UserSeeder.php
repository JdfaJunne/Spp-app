<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'admins',
        //     'email' => 'super@example.com',
        //     'password' => bcrypt('12341234'),
        // ])->assignRole(User::super_admin);

        User::create([
            'name' => 'admins',
            'email' => 'super@example.com',
            'password' => bcrypt('12341234'),
        ])->assignRole('super-admin');

        User::create([
            'name' => 'Dafa',
            'email' => 'Tegar@example.com',
            'password' => bcrypt('12341234'),
        ])->assignRole('siswa');
    }
}
