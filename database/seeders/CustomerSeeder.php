<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;
use App\Models\Branch;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(50)->create();
        foreach($users as $user) {
            $name_arr = explode(" ", $user->name);
            Customer::create([
                'user_id' => $user->id,
                'last_name' => end($name_arr),
                'first_name' => $name_arr[0],
                'status' => Customer::PENDING,
                'branch_id' => Branch::DEFAULT_BRANCH,
            ]);
        }
    }
}
