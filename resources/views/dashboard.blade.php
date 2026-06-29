<x-layouts.app title="Dashboard | Trilha Livre">
    <section class="section-heading">
        <div>
            <p class="eyebrow">Dashboard</p>
            <h1>Ola, {{ auth()->user()->name }}</h1>
            <p class="muted">Resumo das trilhas vinculadas ao seu perfil.</p>
        </div>
        <a class="button" href="{{ route('study-tracks.create') }}">Nova trilha</a>
    </section>

    <section class="metric-grid">
        <article class="metric-card">
            <span>Total</span>
            <strong>{{ $total }}</strong>
        </article>
        <article class="metric-card">
            <span>Em andamento</span>
            <strong>{{ $active }}</strong>
        </article>
        <article class="metric-card">
            <span>Concluidas</span>
            <strong>{{ $completed }}</strong>
        </article>
    </section>

    <section class="panel">
        <div class="section-heading section-heading-tight">
            <div>
                <h2>Trilhas recentes</h2>
                <p class="muted">Continue de onde parou.</p>
            </div>
            <a class="button button-secondary" href="{{ route('study-tracks.index') }}">Ver todas</a>
        </div>

        @forelse ($latestTracks as $track)
            <article class="list-row">
                <div>
                    <strong>{{ $track->title }}</strong>
                    <p class="muted">{{ $track->area }} · {{ $track->statusLabel() }}</p>
                </div>
                <a class="button button-secondary" href="{{ route('study-tracks.show', $track) }}">Abrir</a>
            </article>
        @empty
            <div class="empty-state">
                <h2>Nenhuma trilha cadastrada</h2>
                <p class="muted">Crie sua primeira trilha para acompanhar seu progresso.</p>
            </div>
        @endforelse
    </section>
</x-layouts.app>
