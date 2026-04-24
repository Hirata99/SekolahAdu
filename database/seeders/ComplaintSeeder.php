<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    // Buat 1 admin manual
    \App\Models\User::factory()->create([
        'name' => 'Admin Sarpras',
        'email' => 'admin@sekolah.adu',
        'role' => 'admin',
        'password' => bcrypt('123456789'),
    ]);

    // Buat 20 data complaint dummy
    \App\Models\Complaint::factory()->count(20)->create();
    }
}
