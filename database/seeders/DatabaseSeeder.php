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
                'password' => Hash::make('email'),
        ]);
        \App\Models\User::create([
                'name' => $faker->name(),
                'email' => 'test@test.test',
                'role' => 2,
                'password' => Hash::make('test'),
        ]);
        for ($i=0; $i < 12; $i++) {
            \App\Models\ProjectHeader::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'user_id' => $faker->numberBetween(1, 2),
                'city_name' => \App\Models\City::inRandomOrder()->first()->name,
            ]);
        }
    }
}
