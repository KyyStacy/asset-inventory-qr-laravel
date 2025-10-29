<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan seeder penting karena foreign key constraints
        $this->call([
            UsersTableSeeder::class,
            LocationsTableSeeder::class,
            AssetCategoriesTableSeeder::class,
            AssetsTableSeeder::class,
            LocationAssetsTableSeeder::class,
            AssetTransactionsTableSeeder::class,
        ]);
    }
}
