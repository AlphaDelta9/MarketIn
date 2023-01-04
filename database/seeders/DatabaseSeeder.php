<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Factory::create('id_ID');
        for ($i=0; $i < 98; $i++) {
            \App\Models\City::insert([
                'name' => $faker->unique()->city(),
            ]);
        }
    }
}
