<?php

namespace Database\Seeders;

use App\Models\StudyTrack;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudyTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@trilhalivre.test')->firstOrFail();
        $student = User::where('email', 'estudante@trilhalivre.test')->firstOrFail();
        $monitor = User::where('email', 'monitor@trilhalivre.test')->firstOrFail();

        StudyTrack::factory()->for($admin)->create([
            'title' => 'Revisao de Projetos Laravel',
            'area' => 'Backend',
            'level' => 'advanced',
            'status' => 'active',
            'target_hours' => 40,
            'completed_hours' => 18,
        ]);

        StudyTrack::factory()->for($student)->count(4)->create();
        StudyTrack::factory()->for($monitor)->count(3)->create();
    }
}
