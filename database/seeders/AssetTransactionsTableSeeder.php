<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssetTransaction;

class AssetTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            // Transaksi Laptop
            [
                'ident_code' => 'ELK-001',
                'kode_lokasi' => 'GD-A1',
                'jumlah' => 2,
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'pengaju' => 'Departemen IT',
                'divisi' => 'IT & Development',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Baik, semua fungsi normal',
                'kondisi_masuk' => null,
            ],
            
            // Transaksi Monitor
            [
                'ident_code' => 'COM-001',
                'kode_lokasi' => 'GD-A2',
                'jumlah' => 5,
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'pengaju' => 'Tim Developer',
                'divisi' => 'IT & Development',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Baik, tidak ada dead pixel',
                'kondisi_masuk' => null,
            ],
            
            // Transaksi Keyboard (Sudah Dikembalikan)
            [
                'ident_code' => 'COM-002',
                'kode_lokasi' => 'GD-A2',
                'jumlah' => 3,
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'pengaju' => 'Divisi Finance',
                'divisi' => 'Finance & Accounting',
                'status' => 'Sudah Dikembalikan',
                'kondisi_keluar' => 'Baik, semua tombol berfungsi',
                'kondisi_masuk' => 'Baik, dikembalikan dalam kondisi normal',
            ],
            
            // Transaksi Tools
            [
                'ident_code' => 'TLS-001',
                'kode_lokasi' => 'GD-B1',
                'jumlah' => 2,
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'pengaju' => 'Tim Maintenance',
                'divisi' => 'General Affairs',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Lengkap, semua alat dalam kondisi baik',
                'kondisi_masuk' => null,
            ],
            
            // Transaksi Proyektor (Sudah Dikembalikan)
            [
                'ident_code' => 'ELK-002',
                'kode_lokasi' => 'GD-B2',
                'jumlah' => 1,
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'pengaju' => 'Departemen HR',
                'divisi' => 'Human Resources',
                'status' => 'Sudah Dikembalikan',
                'kondisi_keluar' => 'Baik, gambar tajam dan jelas',
                'kondisi_masuk' => 'Baik, tidak ada kerusakan',
            ],
            
            // Transaksi Helm Safety
            [
                'ident_code' => 'SFT-001',
                'kode_lokasi' => 'WH-01',
                'jumlah' => 15,
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'pengaju' => 'Tim Proyek Konstruksi',
                'divisi' => 'Project Management',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Baru, belum pernah dipakai',
                'kondisi_masuk' => null,
            ],
            
            // Transaksi Sepatu Safety
            [
                'ident_code' => 'SFT-002',
                'kode_lokasi' => 'WH-01',
                'jumlah' => 10,
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'pengaju' => 'Tim Proyek Konstruksi',
                'divisi' => 'Project Management',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Baru, masih dalam kemasan',
                'kondisi_masuk' => null,
            ],
            
            // Transaksi Forklift
            [
                'ident_code' => 'HVY-001',
                'kode_lokasi' => 'WH-01',
                'jumlah' => 1,
                'petugas_id' => 4,
                'petugas' => 'Ahmad Rizki',
                'pengaju' => 'Tim Warehouse',
                'divisi' => 'Logistics',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Baik, baru service rutin',
                'kondisi_masuk' => null,
            ],
            
            // Transaksi Mouse (Sudah Dikembalikan)
            [
                'ident_code' => 'COM-003',
                'kode_lokasi' => 'GD-A2',
                'jumlah' => 7,
                'petugas_id' => 3,
                'petugas' => 'Siti Nurhaliza',
                'pengaju' => 'Departemen Marketing',
                'divisi' => 'Marketing & Sales',
                'status' => 'Sudah Dikembalikan',
                'kondisi_keluar' => 'Baik, baterai penuh',
                'kondisi_masuk' => 'Baik, semua fungsi normal',
            ],
            
            // Transaksi Meja Kerja
            [
                'ident_code' => 'FRN-001',
                'kode_lokasi' => 'GD-A1',
                'jumlah' => 5,
                'petugas_id' => 2,
                'petugas' => 'Budi Santoso',
                'pengaju' => 'New Office Setup',
                'divisi' => 'General Affairs',
                'status' => 'Belum Dikembalikan',
                'kondisi_keluar' => 'Baru, masih dalam plastik',
                'kondisi_masuk' => null,
            ],
        ];

        foreach ($transactions as $transaction) {
            AssetTransaction::create($transaction);
        }
    }
}

