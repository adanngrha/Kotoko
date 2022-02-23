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
            'name' => 'Smartphone',
            'slug' => 'smartphone',
        ]);

        DB::table('categories')->insert([
            'name' => 'Accessories',
            'slug' => 'electronic-accessories',
        ]);

        DB::table('categories')->insert([
            'name' => 'Hardware',
            'slug' => 'hardware',
        ]);

        DB::table('categories')->insert([
            'name' => 'Camera',
            'slug' => 'camera',
        ]);
    }
}
