<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@reedcode.id',
            'password' => Hash::make('password'),
            'no_hp' => 6285171713355,
            'role' => 'admin',
            'foto_profil' => null,
        ]);

        // Karyawan 1
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@reedcode.id',
            'password' => Hash::make('password'),
            'no_hp' => 628123456789,
            'role' => 'karyawan',
            'foto_profil' => null,
        ]);

        // Karyawan 2
        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti.nurhaliza@reedcode.id',
            'password' => Hash::make('password'),
            'no_hp' => 628234567890,
            'role' => 'karyawan',
            'foto_profil' => null,
        ]);

        // Karyawan 3
        User::create([
            'name' => 'Ahmad Rizki',
            'email' => 'ahmad.rizki@reedcode.id',
            'password' => Hash::make('password'),
            'no_hp' => 628345678901,
            'role' => 'karyawan',
            'foto_profil' => null,
        ]);
    }
}
