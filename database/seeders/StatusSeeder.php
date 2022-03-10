<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status' => 'ORDERED'
        ]);

        DB::table('statuses')->insert([
            'status' => 'PAID'
        ]);

        DB::table('statuses')->insert([
            'status' => 'PACKED'
        ]);

        DB::table('statuses')->insert([
            'status' => 'SENT'
        ]);

        DB::table('statuses')->insert([
            'status' => 'RECEIVED'
        ]);

        DB::table('statuses')->insert([
            'status' => 'REVIEWED'
        ]);

        DB::table('statuses')->insert([
            'status' => 'CANCELLED'
        ]);
    }
}
