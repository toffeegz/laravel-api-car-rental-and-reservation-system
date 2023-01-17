<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 
        $this->call([
            CompanyInformationSeeder::class,
            RoleSeeder::class,
            AdministratorSeeder::class,
            BranchSeeder::class,
            BrandSeeder::class,
            CustomerSeeder::class,
            InclusionTypeSeeder::class,
            PromotionalPostSeeder::class
        ]);
    }
}
