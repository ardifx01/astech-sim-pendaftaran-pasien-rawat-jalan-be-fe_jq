<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Patient::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nik' => fake()->randomNumber(8) . fake()->randomNumber(8),
            'gender' => fake()->randomElement(['L', 'P']),
            'birth_date' => fake()->date(),
            'phone' => substr(fake()->phoneNumber(), 0, 15),
            'address' => fake()->address(),
            'created_at' => now(),
        ];
    }
}
