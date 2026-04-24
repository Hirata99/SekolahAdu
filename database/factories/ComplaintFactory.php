<?php

namespace Database\Factories;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => User::factory(), // Membuat user baru otomatis
        'judul' => fake()->sentence(3),
        'deskripsi' => fake()->paragraph(),
        'lokasi' => fake()->randomElement(['Kelas X-1', 'Toilet Lantai 2', 'Lab Komputer', 'Kantin']),
        'status' => fake()->randomElement(['pending', 'proses', 'selesai']),

        ];
    }
}
