<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssetCategory;

class AssetCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Furniture',
            'Kendaraan',
            'Alat Berat',
            'Komputer & Aksesoris',
            'Peralatan Kantor',
            'Tools & Equipment',
            'Safety Equipment',
        ];

        foreach ($categories as $category) {
            AssetCategory::create([
                'name' => $category,
            ]);
        }
    }
}

