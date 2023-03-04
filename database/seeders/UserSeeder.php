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
        User::create(['name' => 'Melvin', 'email' => 'penyedia@gmail.com', 'password' => bcrypt('asdfg'), 'date_of_birth' => '2020-06-06', 'role_id' => 1]);
        User::create(['name' => 'Itto', 'email' => 'pengguna@gmail.com', 'password' => bcrypt('asdfg'), 'date_of_birth' => '2020-06-06', 'role_id' => 2]);
    }
}
