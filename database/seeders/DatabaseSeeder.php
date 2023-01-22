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
                'name' => 'pengguna',
                'email' => 'pengguna@pengguna.pengguna',
                'profile' => $faker->name(),
                'role' => true,
                'password' => Hash::make('pengguna@pengguna.pengguna'),
        ]);
        \App\Models\User::create([
                'name' => 'penyedia',
                'email' => 'penyedia@penyedia.penyedia',
                'profile' => $faker->name(),
                'role' => false,
                'password' => Hash::make('penyedia@penyedia.penyedia'),
        ]);
        \App\Models\Type::create(['name' => 'Logo', 'icon' => 'fas fa-draw-polygon']);
        \App\Models\Type::create(['name' => 'Narasi', 'icon' => 'fas fa-pencil-alt']);
        \App\Models\Type::create(['name' => 'Banner', 'icon' => 'fas fa-drafting-compass']);
        \App\Models\Type::create(['name' => 'Poster', 'icon' => 'fas fa-quidditch']);
        for ($i=0; $i < 12; $i++) {
            \App\Models\ProjectHeader::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(6),
                'type_name' => \App\Models\Type::inRandomOrder()->first()->name,
                'user_id' => 1,
                'city_name' => \App\Models\City::inRandomOrder()->first()->name,
            ]);
        }
        for ($i=0; $i < 3; $i++) {
            \App\Models\ProjectDetail::create([
                'project_header_id' => $faker->numberBetween(1, 12),
                'user_id' => 2,
            ]);
        }
    }
}
