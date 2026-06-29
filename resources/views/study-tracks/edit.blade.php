<x-layouts.app title="Editar trilha | Trilha Livre">
    <section class="section-heading">
        <div>
            <p class="eyebrow">Edicao</p>
            <h1>Editar trilha</h1>
            <p class="muted">{{ $studyTrack->title }}</p>
        </div>
    </section>

    <x-study-track-form
        :study-track="$studyTrack"
        :levels="$levels"
        :statuses="$statuses"
        :action="route('study-tracks.update', $studyTrack)"
        method="PUT"
    />
</x-layouts.app>
