<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visits>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments = ['Poli Umum', 'Poli Gigi', 'Poli Mata', 'Poli Jantung', 'Poli Penyakit Dalam', 'Poli Paru', 'Poli Ginjal'];
        $complaints = ['Sakit Kepala', 'Sakit Kaki', 'Demam', 'Sakit Perut', 'Mual', 'Flu', 'Batuk', 'Nyeri', 'Hipertensi'];

        return [
            'patient_id' => fake()->numberBetween(1, 10),
            'visit_date' => fake()->date(),
            'department' => fake()->randomElement($departments),
            'doctor_name' => "Dr. " . fake()->name(),
            'complaint' => fake()->randomElement($complaints),
            'created_at' => now(),
        ];
    }
}
