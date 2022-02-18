<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
        \App\Models\Product::factory(20)->create();

        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
        ]);

        $seller = User::create([
            'id' => 1,
            'username' => 'seller',
            'email' => 'seller@test.test',
            'password' => bcrypt('seller123'),
        ]);
        $seller->assignRole(3);

        Profile::create([
            'user_id' => $seller['id'],
        ]);

        $user = User::create([
            'id'=>2,
            'username' => 'adan',
            'email' => 'adan@test.test',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole("Buyer");

        Profile::create([
            'user_id' => $user['id'],
        ]);
    }
}
