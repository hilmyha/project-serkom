<?php

namespace Database\Seeders;

use App\Models\Beasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeding data beasiswa
        Beasiswa::create([
            'name' => 'Beasiswa Akademik',
            'description' => 'Program Beasiswa Pendidikan adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.',
            'syarat' => json_encode(['IPK minimal 3.0', 'Berkas Persetujuan', 'Tidak Sedang Menerima Beasiswa Lain'])
        ]);
        Beasiswa::create([
            'name' => 'Beasiswa Non Akademik',
            'description' => 'Program Beasiswa Pendidikan adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.',
            'syarat' => json_encode(['IPK minimal 3.0', 'Berkas Persetujuan', 'Mahasiswa Aktif'])
        ]);
        Beasiswa::create([
            'name' => 'Beasiswa Kedinasan',
            'description' => 'Program Beasiswa Pendidikan adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.',
            'syarat' => json_encode(['IPK minimal 3.0', 'Berkas Persetujuan'])
        ]);
    }
}
