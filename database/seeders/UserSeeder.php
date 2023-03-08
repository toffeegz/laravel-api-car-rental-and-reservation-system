<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CUSTOMERS
        User::factory()->count(50)->create();

        // SUPERADMINISTRATOR
        $superadmin = User::create([
            'name' => 'Gezryl SuperAdmin',
            'password' => Hash::make('password123'),
            'email' => 'toffee.gez@gmail.com',
            'role_id' => Role::SUPERADMINISTRATOR,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // ADMINISTRATOR
        $admin = User::create([
            'name' => 'Gezryl Admin',
            'password' => Hash::make('password123'),
            'email' => 'gabriellegallego@gmail.com',
            'role_id' => Role::ADMINISTRATOR,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        
    }
}
