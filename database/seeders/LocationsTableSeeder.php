<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'kode_lokasi' => 'GD-A1',
                'name' => 'Gedung A - Lantai 1',
                'detail_lokasi' => 'Ruang penyimpanan utama gedung A lantai 1, dekat dengan area loading dock',
                'koordinat_x' => -6.200000,
                'koordinat_y' => 106.816666,
            ],
            [
                'kode_lokasi' => 'GD-A2',
                'name' => 'Gedung A - Lantai 2',
                'detail_lokasi' => 'Ruang server dan IT equipment gedung A lantai 2',
                'koordinat_x' => -6.201000,
                'koordinat_y' => 106.817000,
            ],
            [
                'kode_lokasi' => 'GD-B1',
                'name' => 'Gedung B - Lantai 1',
                'detail_lokasi' => 'Area workshop dan maintenance gedung B lantai 1',
                'koordinat_x' => -6.202000,
                'koordinat_y' => 106.818000,
            ],
            [
                'kode_lokasi' => 'GD-B2',
                'name' => 'Gedung B - Lantai 2',
                'detail_lokasi' => 'Ruang meeting dan training gedung B lantai 2',
                'koordinat_x' => -6.203000,
                'koordinat_y' => 106.819000,
            ],
            [
                'kode_lokasi' => 'WH-01',
                'name' => 'Warehouse 1',
                'detail_lokasi' => 'Gudang penyimpanan barang besar dan peralatan berat',
                'koordinat_x' => -6.204000,
                'koordinat_y' => 106.820000,
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}

