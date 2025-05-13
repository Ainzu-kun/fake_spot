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
        $semesters = [
            [
                'semester' => 1,
                'tahun_ajaran' => '2024',
            ],
            [
                'semester' => 2,
                'tahun_ajaran' => '2024',
            ],
            [
                'semester' => 3,
                'tahun_ajaran' => '2025',
            ],
        ];

        foreach ($semesters as $semester) {
            Semester::create($semester);
        }
    }
}
