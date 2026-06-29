<?php

namespace Database\Factories;

use App\Models\StudyTrack;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyTrack>
 */
class StudyTrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $targetHours = fake()->numberBetween(8, 80);
        $status = fake()->randomElement(['planned', 'active', 'paused', 'completed']);
        $startDate = fake()->dateTimeBetween('-30 days', '+15 days');

        return [
            'user_id' => User::factory(),
            'title' => fake()->randomElement([
                'Fundamentos de Laravel',
                'Banco de Dados com SQLite',
                'Testes Automatizados',
                'Boas Praticas de PHP',
                'Interfaces com Blade',
                'Seguranca em Aplicacoes Web',
            ]),
            'area' => fake()->randomElement(['Backend', 'Banco de Dados', 'Testes', 'Frontend', 'Seguranca']),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
            'status' => $status,
            'target_hours' => $targetHours,
            'completed_hours' => $status === 'completed' ? $targetHours : fake()->numberBetween(0, $targetHours - 1),
            'start_date' => $startDate,
            'due_date' => fake()->dateTimeBetween($startDate, '+90 days'),
            'notes' => fake()->sentence(14),
        ];
    }
}
