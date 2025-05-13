<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('username', 'admin')->exists()) {
            User::create([
                'username' => 'admin',
                'email' => 'admin@upi.edu',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ], [
                'username' => 'dosen',
                'email' => 'dosen@upi.edu',
                'password' => bcrypt('dosen'),
                'role' => 'dosen'
            ]);
        }

    }
}
