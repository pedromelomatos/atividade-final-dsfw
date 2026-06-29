<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@trilhalivre.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Estudante Teste',
            'email' => 'estudante@trilhalivre.test',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        User::factory()->create([
            'name' => 'Monitor Teste',
            'email' => 'monitor@trilhalivre.test',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        $this->call(StudyTrackSeeder::class);
    }
}
