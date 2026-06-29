<?php

namespace Tests\Feature;

use App\Models\StudyTrack;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class StudyTrackTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_authenticated_user_can_manage_own_study_track(): void
    {
        $user = User::factory()->create();

        $storeResponse = $this
            ->actingAs($user)
            ->post(route('study-tracks.store'), $this->validTrackData([
                'title' => 'Laravel para avaliacao final',
            ]));

        $studyTrack = StudyTrack::where('title', 'Laravel para avaliacao final')->firstOrFail();

        $storeResponse->assertRedirect(route('study-tracks.show', $studyTrack));
        $this->assertModelExists($studyTrack);

        $this
            ->actingAs($user)
            ->get(route('study-tracks.show', $studyTrack))
            ->assertOk()
            ->assertSee('Laravel para avaliacao final');

        $this
            ->actingAs($user)
            ->put(route('study-tracks.update', $studyTrack), $this->validTrackData([
                'title' => 'Laravel concluido',
                'completed_hours' => 20,
                'status' => 'completed',
            ]))
            ->assertRedirect(route('study-tracks.show', $studyTrack));

        $this->assertSame('Laravel concluido', $studyTrack->fresh()->title);

        $this
            ->actingAs($user)
            ->delete(route('study-tracks.destroy', $studyTrack))
            ->assertRedirect(route('study-tracks.index'));

        $this->assertModelMissing($studyTrack);
    }

    public function test_invalid_track_data_returns_validation_errors(): void
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->post(route('study-tracks.store'), $this->validTrackData([
                'title' => '',
                'completed_hours' => 50,
                'target_hours' => 10,
                'due_date' => '2026-01-01',
                'start_date' => '2026-02-01',
            ]))
            ->assertSessionHasErrors(['title', 'completed_hours', 'due_date']);
    }

    public function test_student_cannot_access_another_students_track(): void
    {
        $owner = User::factory()->create();
        $otherStudent = User::factory()->create();
        $studyTrack = StudyTrack::factory()->for($owner)->create([
            'title' => 'Trilha privada',
        ]);

        $this
            ->actingAs($otherStudent)
            ->get(route('study-tracks.show', $studyTrack))
            ->assertForbidden();

        $this
            ->actingAs($otherStudent)
            ->get(route('study-tracks.index'))
            ->assertOk()
            ->assertDontSee('Trilha privada');
    }

    public function test_admin_can_view_all_tracks(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $student = User::factory()->create();

        StudyTrack::factory()->for($student)->create([
            'title' => 'Trilha visivel para admin',
        ]);

        $this
            ->actingAs($admin)
            ->get(route('study-tracks.index'))
            ->assertOk()
            ->assertSee('Trilha visivel para admin')
            ->assertSee($student->name);
    }

    /**
     * @param array<string, mixed> $overrides
     *
     * @return array<string, mixed>
     */
    private function validTrackData(array $overrides = []): array
    {
        return [
            'title' => 'Trilha de Testes',
            'area' => 'Testes',
            'level' => 'intermediate',
            'status' => 'active',
            'target_hours' => 40,
            'completed_hours' => 10,
            'start_date' => '2026-06-01',
            'due_date' => '2026-07-01',
            'notes' => 'Plano criado durante teste automatizado.',
            ...$overrides,
        ];
    }
}
