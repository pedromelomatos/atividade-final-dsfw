<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudyTrackRequest;
use App\Http\Requests\UpdateStudyTrackRequest;
use App\Models\StudyTrack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class StudyTrackController extends Controller
{
    public function index(Request $request): View
    {
        Gate::authorize('viewAny', StudyTrack::class);

        $selectedStatus = $request->string('status')->toString();
        $query = $this->visibleTracks($request);

        if (array_key_exists($selectedStatus, StudyTrack::statuses())) {
            $query->where('status', $selectedStatus);
        }

        return view('study-tracks.index', [
            'studyTracks' => $query->paginate(10)->withQueryString(),
            'statuses' => StudyTrack::statuses(),
            'selectedStatus' => $selectedStatus,
        ]);
    }

    public function create(): View
    {
        Gate::authorize('create', StudyTrack::class);

        return view('study-tracks.create', $this->formOptions());
    }

    public function store(StoreStudyTrackRequest $request): RedirectResponse
    {
        Gate::authorize('create', StudyTrack::class);

        $studyTrack = StudyTrack::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);

        return redirect()
            ->route('study-tracks.show', $studyTrack)
            ->with('status', 'Trilha criada com sucesso.');
    }

    public function show(StudyTrack $studyTrack): View
    {
        Gate::authorize('view', $studyTrack);

        return view('study-tracks.show', ['studyTrack' => $studyTrack->load('user')]);
    }

    public function edit(StudyTrack $studyTrack): View
    {
        Gate::authorize('update', $studyTrack);

        return view('study-tracks.edit', [
            'studyTrack' => $studyTrack,
            ...$this->formOptions(),
        ]);
    }

    public function update(UpdateStudyTrackRequest $request, StudyTrack $studyTrack): RedirectResponse
    {
        Gate::authorize('update', $studyTrack);

        $studyTrack->update($request->validated());

        return redirect()
            ->route('study-tracks.show', $studyTrack)
            ->with('status', 'Trilha atualizada com sucesso.');
    }

    public function destroy(StudyTrack $studyTrack): RedirectResponse
    {
        Gate::authorize('delete', $studyTrack);

        $studyTrack->delete();

        return redirect()
            ->route('study-tracks.index')
            ->with('status', 'Trilha excluida com sucesso.');
    }

    private function visibleTracks(Request $request): Builder
    {
        $query = StudyTrack::query()->with('user')->latest();

        if (! $request->user()->isAdmin()) {
            $query->whereBelongsTo($request->user());
        }

        return $query;
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function formOptions(): array
    {
        return [
            'levels' => StudyTrack::levels(),
            'statuses' => StudyTrack::statuses(),
        ];
    }
}
