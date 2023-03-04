<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Makanan & Minuman']);
        Category::create(['name' => 'Kerajinan']);
        Category::create(['name' => 'Farmasi dan Kesehatan']);
        Category::create(['name' => 'Tekstil (pakaian)']);
        Category::create(['name' => 'Otomotif']);
        Category::create(['name' => 'Hasil Bumi dan Bahan Tambang']);
    }
}
