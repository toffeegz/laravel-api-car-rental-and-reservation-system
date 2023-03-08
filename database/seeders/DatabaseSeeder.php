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
            BranchSeeder::class,
            BrandSeeder::class,
            CompanyInformationSeeder::class,
            InclusionTypeSeeder::class,
            PromotionalPostSeeder::class,
            RoleSeeder::class,
            TransactionStatusSeeder::class,
            UnitClassificationSeeder::class,
            UserSeeder::class,
        ]);
    }
}
