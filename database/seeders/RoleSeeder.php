<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name'=>'administrator',
                'guard_name'=>'web'
            ],
            [
                'name'=>'buyer',
                'guard_name'=>'web'
            ],
            [
                'name'=>'seller',
                'guard_name'=>'web'
            ],
        ])->each(function($roles) {
            Role::create($roles);
        });
    }
}
