<x-layouts.app title="Trilhas | Trilha Livre">
    <section class="section-heading">
        <div>
            <p class="eyebrow">Trilhas</p>
            <h1>Minhas trilhas de estudo</h1>
            <p class="muted">Acompanhe prazos, horas e situacao de cada objetivo.</p>
        </div>
        <a class="button" href="{{ route('study-tracks.create') }}">Nova trilha</a>
    </section>

    <form class="filter-bar" method="GET" action="{{ route('study-tracks.index') }}">
        <label for="status">Filtrar por status</label>
        <select id="status" name="status">
            <option value="">Todos</option>
            @foreach ($statuses as $value => $label)
                <option value="{{ $value }}" @selected($selectedStatus === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <button class="button button-secondary" type="submit">Filtrar</button>
    </form>

    @if ($studyTracks->isEmpty())
        <article class="empty-state">
            <h2>Nenhuma trilha encontrada</h2>
            <p class="muted">Crie uma trilha para comecar a acompanhar seu plano de estudos.</p>
            <a class="button" href="{{ route('study-tracks.create') }}">Criar trilha</a>
        </article>
    @else
        <div class="track-grid">
            @foreach ($studyTracks as $track)
                <article class="track-card">
                    <div class="card-header">
                        <span class="badge badge-{{ $track->status }}">{{ $track->statusLabel() }}</span>
                        <span class="muted">{{ $track->levelLabel() }}</span>
                    </div>
                    <h2><a href="{{ route('study-tracks.show', $track) }}">{{ $track->title }}</a></h2>
                    <p class="muted">{{ $track->area }}</p>
                    <div class="progress" aria-label="Progresso de {{ $track->progressPercentage() }}%">
                        <span style="width: {{ $track->progressPercentage() }}%"></span>
                    </div>
                    <p class="muted">{{ $track->completed_hours }} de {{ $track->target_hours }} horas</p>
                    @if (auth()->user()->isAdmin())
                        <p class="muted">Responsavel: {{ $track->user->name }}</p>
                    @endif
                    <div class="actions">
                        <a class="button button-secondary" href="{{ route('study-tracks.edit', $track) }}">Editar</a>
                        <a class="button button-secondary" href="{{ route('study-tracks.show', $track) }}">Detalhes</a>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $studyTracks->links() }}
    @endif
</x-layouts.app>
