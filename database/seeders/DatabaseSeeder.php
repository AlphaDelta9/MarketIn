<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i=0; $i < 98; $i++) {
            \App\Models\City::insert([
                'name' => $faker->unique()->city(),
            ]);
        }
        \App\Models\User::create([
                'name' => $faker->name(),
                'email' => 'email@email.email',
                'role' => 1,
                'password' => Hash::make('password'),
        ]);
        for ($i=0; $i < 12; $i++) {
            \App\Models\ProjectHeader::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'user_id' => 1,
                'city_name' => \App\Models\City::inRandomOrder()->first()->name,
            ]);
        }
    }
}
