<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
            // MockApiResponsesSeeder::class,
            // CustomerSeeder::class,
            // OfferSeeder::class,
            // ApiCallLogSeeder::class,
            // CitySeeder::class,
            // ResidentialSeeder::class,
            // PurposeSeeder::class,
            OwnershipSeeder::class,
        ]);
    }
}
