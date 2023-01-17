<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InclusionType;

class InclusionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        InclusionType::truncate();

        $datum = [
            [
                'id' => 1,
                'name' => 'Seat Capacity',
                'default_value' => '4',
                'description' => 'Seat Capacity',
            ],
            [
                'id' => 2,
                'name' => 'Bunker Capacity',
                'default_value' => '2 Large Luggage',
                'description' => 'Bunker Capacity',
            ],
            [
                'id' => 3,
                'name' => 'Engine',
                'default_value' => '1.5 Gasoline Engine',
                'description' => 'Diesel/Gasoline Engine',
            ],
            [
                'id' => 4,
                'name' => 'RFID Ready',
                'default_value' => 'RFID Ready',
                'description' => 'RFID Ready',
            ],
        ];

        foreach($datum as $data) {
            InclusionType::create($data);
        }
        
    }
}
