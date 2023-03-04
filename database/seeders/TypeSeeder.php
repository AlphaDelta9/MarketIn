<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['name' => 'Logo', 'icon' => 'fas fa-draw-polygon']);
        Type::create(['name' => 'Narasi', 'icon' => 'fas fa-pencil-alt']);
        Type::create(['name' => 'Banner', 'icon' => 'fas fa-drafting-compass']);
        Type::create(['name' => 'Poster', 'icon' => 'fas fa-quidditch']);
        Type::create(['name' => 'Iklan', 'icon' => 'fab fa-adversal']);
    }
}
