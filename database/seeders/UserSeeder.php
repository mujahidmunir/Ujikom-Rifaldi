<?php

namespace Database\Seeders;

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
        $admin = User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');


    }
}
