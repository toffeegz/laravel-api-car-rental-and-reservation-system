<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::truncate();

        Branch::create([
            'name' => 'Main',
            'location' => 'Carmona, Cavite',
            'description' => 'Main branch'
        ]);
    }
}
