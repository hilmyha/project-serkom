<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeding data semester
        Semester::create([
            'name' => 'Semester 1',
            'ipk' => '3.5',
        ]);
        Semester::create([
            'name' => 'Semester 2',
            'ipk' => '2.5',
        ]);
        Semester::create([
            'name' => 'Semester 3',
            'ipk' => '3',
        ]);
        Semester::create([
            'name' => 'Semester 4',
            'ipk' => '3.7',
        ]);
        Semester::create([
            'name' => 'Semester 5',
            'ipk' => '2.7',
        ]);
        Semester::create([
            'name' => 'Semester 6',
            'ipk' => '3.9',
        ]);
        Semester::create([
            'name' => 'Semester 7',
            'ipk' => '2.9',
        ]);
        Semester::create([
            'name' => 'Semester 8',
            'ipk' => '3.8',
        ]);
    }
}
