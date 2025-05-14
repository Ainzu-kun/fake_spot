<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Semester::where('id', 1)->exists()) {
            Semester::create([
                'semester' => 1,
                'tahun_ajaran' => '2025',
            ]);

            Semester::create([
                'semester' => 2,
                'tahun_ajaran' => '2025',
            ]);

            Semester::create([
                'semester' => 3,
                'tahun_ajaran' => '2024',
            ]);
        }
    }
}
