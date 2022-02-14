<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Laptop',
            'slug' => 'laptop',
        ]);

        DB::table('categories')->insert([
            'name' => 'Ponsel',
            'slug' => 'phone',
        ]);

        DB::table('categories')->insert([
            'name' => 'Aksesoris',
            'slug' => 'electronic-accessories',
        ]);

        DB::table('categories')->insert([
            'name' => 'Perangkat Keras',
            'slug' => 'hardware',
        ]);

        DB::table('categories')->insert([
            'name' => 'Kamera',
            'slug' => 'camera',
        ]);
    }
}
