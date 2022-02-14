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

        $user = User::create([
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
