<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assets = [
            // Elektronik
            ['ident_code' => 'ELK-001', 'name' => 'Laptop Dell Latitude 5420', 'asset_category_id' => 1],
            ['ident_code' => 'ELK-002', 'name' => 'Proyektor Epson EB-X41', 'asset_category_id' => 1],
            ['ident_code' => 'ELK-003', 'name' => 'Printer HP LaserJet Pro', 'asset_category_id' => 1],
            
            // Furniture
            ['ident_code' => 'FRN-001', 'name' => 'Meja Kerja Kayu Jati', 'asset_category_id' => 2],
            ['ident_code' => 'FRN-002', 'name' => 'Kursi Kantor Ergonomis', 'asset_category_id' => 2],
            ['ident_code' => 'FRN-003', 'name' => 'Lemari Arsip Besi', 'asset_category_id' => 2],
            
            // Kendaraan
            ['ident_code' => 'VHC-001', 'name' => 'Toyota Avanza 2020', 'asset_category_id' => 3],
            ['ident_code' => 'VHC-002', 'name' => 'Honda Beat 2021', 'asset_category_id' => 3],
            
            // Alat Berat
            ['ident_code' => 'HVY-001', 'name' => 'Forklift 3 Ton', 'asset_category_id' => 4],
            ['ident_code' => 'HVY-002', 'name' => 'Generator 50 KVA', 'asset_category_id' => 4],
            
            // Komputer & Aksesoris
            ['ident_code' => 'COM-001', 'name' => 'Monitor LG 24 inch', 'asset_category_id' => 5],
            ['ident_code' => 'COM-002', 'name' => 'Keyboard Mechanical Logitech', 'asset_category_id' => 5],
            ['ident_code' => 'COM-003', 'name' => 'Mouse Wireless Logitech', 'asset_category_id' => 5],
            
            // Peralatan Kantor
            ['ident_code' => 'OFC-001', 'name' => 'Mesin Fotocopy Canon', 'asset_category_id' => 6],
            ['ident_code' => 'OFC-002', 'name' => 'Paper Shredder', 'asset_category_id' => 6],
            ['ident_code' => 'OFC-003', 'name' => 'Whiteboard 120x180cm', 'asset_category_id' => 6],
            
            // Tools & Equipment
            ['ident_code' => 'TLS-001', 'name' => 'Tool Set 100 pcs', 'asset_category_id' => 7],
            ['ident_code' => 'TLS-002', 'name' => 'Bor Listrik Bosch', 'asset_category_id' => 7],
            ['ident_code' => 'TLS-003', 'name' => 'Mesin Las Argon', 'asset_category_id' => 7],
            
            // Safety Equipment
            ['ident_code' => 'SFT-001', 'name' => 'Helm Safety', 'asset_category_id' => 8],
            ['ident_code' => 'SFT-002', 'name' => 'Sepatu Safety', 'asset_category_id' => 8],
            ['ident_code' => 'SFT-003', 'name' => 'Fire Extinguisher 6kg', 'asset_category_id' => 8],
        ];

        foreach ($assets as $asset) {
            Asset::create($asset);
        }
    }
}

