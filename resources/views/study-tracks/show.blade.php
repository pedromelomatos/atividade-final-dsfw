<x-layouts.app title="{{ $studyTrack->title }} | Trilha Livre">
    <section class="section-heading">
        <div>
            <p class="eyebrow">Detalhes</p>
            <h1>{{ $studyTrack->title }}</h1>
            <p class="muted">{{ $studyTrack->area }} · {{ $studyTrack->levelLabel() }}</p>
        </div>
        <div class="actions">
            <a class="button button-secondary" href="{{ route('study-tracks.edit', $studyTrack) }}">Editar</a>
            <a class="button button-secondary" href="{{ route('study-tracks.index') }}">Voltar</a>
        </div>
    </section>

    <article class="detail-card">
        <div class="card-header">
            <span class="badge badge-{{ $studyTrack->status }}">{{ $studyTrack->statusLabel() }}</span>
            @if (auth()->user()->isAdmin())
                <span class="muted">Responsavel: {{ $studyTrack->user->name }}</span>
            @endif
        </div>

        <div class="progress progress-large" aria-label="Progresso de {{ $studyTrack->progressPercentage() }}%">
            <span style="width: {{ $studyTrack->progressPercentage() }}%"></span>
        </div>

        <dl class="details-grid">
            <div>
                <dt>Horas planejadas</dt>
                <dd>{{ $studyTrack->target_hours }}</dd>
            </div>
            <div>
                <dt>Horas concluidas</dt>
                <dd>{{ $studyTrack->completed_hours }}</dd>
            </div>
            <div>
                <dt>Inicio</dt>
                <dd>{{ $studyTrack->start_date?->format('d/m/Y') ?? 'Nao informado' }}</dd>
            </div>
            <div>
                <dt>Prazo</dt>
                <dd>{{ $studyTrack->due_date?->format('d/m/Y') ?? 'Nao informado' }}</dd>
            </div>
        </dl>

        <h2>Observacoes</h2>
        <p class="notes">{{ $studyTrack->notes ?: 'Sem observacoes cadastradas.' }}</p>

        <form method="POST" action="{{ route('study-tracks.destroy', $studyTrack) }}" onsubmit="return confirm('Deseja excluir esta trilha?')">
            @csrf
            @method('DELETE')
            <button class="button button-danger" type="submit">Excluir trilha</button>
        </form>
    </article>
</x-layouts.app>
