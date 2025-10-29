<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LocationAsset;

class LocationAssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locationAssets = [
            // Gedung A - Lantai 1
            [
                'kode_lokasi' => 'GD-A1',
                'ident_code' => 'ELK-001',
                'deskripsi' => 'Laptop untuk keperluan operasional tim IT',
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'stok' => 10,
            ],
            [
                'kode_lokasi' => 'GD-A1',
                'ident_code' => 'FRN-001',
                'deskripsi' => 'Meja kerja untuk ruang operasional',
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'stok' => 15,
            ],
            [
                'kode_lokasi' => 'GD-A1',
                'ident_code' => 'FRN-002',
                'deskripsi' => 'Kursi kantor ergonomis untuk karyawan',
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'stok' => 20,
            ],

            // Gedung A - Lantai 2
            [
                'kode_lokasi' => 'GD-A2',
                'ident_code' => 'COM-001',
                'deskripsi' => 'Monitor untuk workstation karyawan',
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'stok' => 25,
            ],
            [
                'kode_lokasi' => 'GD-A2',
                'ident_code' => 'COM-002',
                'deskripsi' => 'Keyboard mechanical untuk programmer',
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'stok' => 30,
            ],
            [
                'kode_lokasi' => 'GD-A2',
                'ident_code' => 'COM-003',
                'deskripsi' => 'Mouse wireless untuk seluruh karyawan',
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'stok' => 35,
            ],

            // Gedung B - Lantai 1
            [
                'kode_lokasi' => 'GD-B1',
                'ident_code' => 'TLS-001',
                'deskripsi' => 'Tool set lengkap untuk maintenance',
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'stok' => 8,
            ],
            [
                'kode_lokasi' => 'GD-B1',
                'ident_code' => 'TLS-002',
                'deskripsi' => 'Bor listrik untuk pekerjaan teknis',
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'stok' => 5,
            ],
            [
                'kode_lokasi' => 'GD-B1',
                'ident_code' => 'TLS-003',
                'deskripsi' => 'Mesin las untuk workshop',
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'stok' => 3,
            ],

            // Gedung B - Lantai 2
            [
                'kode_lokasi' => 'GD-B2',
                'ident_code' => 'ELK-002',
                'deskripsi' => 'Proyektor untuk ruang meeting dan training',
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'stok' => 4,
            ],
            [
                'kode_lokasi' => 'GD-B2',
                'ident_code' => 'OFC-003',
                'deskripsi' => 'Whiteboard untuk ruang training',
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'stok' => 6,
            ],

            // Warehouse 1
            [
                'kode_lokasi' => 'WH-01',
                'ident_code' => 'HVY-001',
                'deskripsi' => 'Forklift untuk loading unloading barang',
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'stok' => 2,
            ],
            [
                'kode_lokasi' => 'WH-01',
                'ident_code' => 'HVY-002',
                'deskripsi' => 'Generator cadangan untuk warehouse',
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'stok' => 1,
            ],
            [
                'kode_lokasi' => 'WH-01',
                'ident_code' => 'VHC-001',
                'deskripsi' => 'Kendaraan operasional untuk mobilitas',
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'stok' => 3,
            ],
            [
                'kode_lokasi' => 'WH-01',
                'ident_code' => 'SFT-001',
                'deskripsi' => 'Helm safety untuk pekerja lapangan',
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'stok' => 50,
            ],
            [
                'kode_lokasi' => 'WH-01',
                'ident_code' => 'SFT-002',
                'deskripsi' => 'Sepatu safety untuk pekerja lapangan',
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'stok' => 45,
            ],
            [
                'kode_lokasi' => 'WH-01',
                'ident_code' => 'SFT-003',
                'deskripsi' => 'Fire extinguisher untuk keamanan warehouse',
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'stok' => 12,
            ],
        ];

        foreach ($locationAssets as $locationAsset) {
            LocationAsset::create($locationAsset);
        }
    }
}

