<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'id' => 1,
            'name' => 'Super Administrator',
            'slug' => 'super-administrator',
            'description' => 'Admin of all'
        ]);

        Role::create([
            'id' => 2,
            'name' => 'Administrator',
            'slug' => 'administrator',
            'description' => 'Admin supposedly for each branch'
        ]);
    }
}
