<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(MataKuliah::where('id', 1)->exists()) {
            MataKuliah::create([
                'kode_mk' => 'MK001',
                'nama_mk' => 'Matematika Dasar',
                'sks' => 4,
                'dosen_id' => 1,
            ]);
        }
    }
}
