<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use App\Models\CompanyInformation;

class CompanyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyInformation::truncate();

        CompanyInformation::updateOrCreate(['id' => CompanyInformation::DEFAULT],[
            'name' => 'Car Rental Reservation System',
            'address' => 'Carmona, Cavite',
            'phone' => '(049) 123 4567',
            'email' => 'test@admin.com',
        ]);
    }
}
