<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = User::factory()->count(49)->create();
        foreach($users as $user) {
            $user->role_id = Role::ADMINISTRATOR;
            $user->save();
        }

        $users = User::create([
            'name' => 'Admin Gz',
            'email' => 'gezrylclarizg@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password.123'), // password
            'remember_token' => Str::random(10),
            'role_id' => Role::SUPERADMINISTRATOR,
        ]);
    }
}
