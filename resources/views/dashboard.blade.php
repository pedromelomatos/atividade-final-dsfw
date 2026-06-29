<x-layouts.app title="Dashboard | Trilha Livre">
    <section class="section-heading">
        <div>
            <p class="eyebrow">Dashboard</p>
            <h1>Ola, {{ auth()->user()->name }}</h1>
            <p class="muted">Suas trilhas de estudo aparecerao aqui depois do cadastro.</p>
        </div>
    </section>
</x-layouts.app>
