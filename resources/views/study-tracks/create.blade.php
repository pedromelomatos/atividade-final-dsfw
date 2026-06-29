<x-layouts.app title="Nova trilha | Trilha Livre">
    <section class="section-heading">
        <div>
            <p class="eyebrow">Cadastro</p>
            <h1>Nova trilha</h1>
            <p class="muted">Defina objetivo, prazo e carga horaria planejada.</p>
        </div>
    </section>

    <x-study-track-form
        :levels="$levels"
        :statuses="$statuses"
        :action="route('study-tracks.store')"
    />
</x-layouts.app>
