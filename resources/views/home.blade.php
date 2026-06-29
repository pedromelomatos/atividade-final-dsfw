<x-layouts.app title="Trilha Livre">
    <section class="hero">
        <div>
            <p class="eyebrow">Gestao de estudos</p>
            <h1>Organize trilhas, acompanhe progresso e conclua seus objetivos.</h1>
            <p class="hero-copy">
                Cadastre planos de estudo por area, nivel, prazo e carga horaria. O Trilha Livre ajuda estudantes a manterem o foco no que precisa avancar.
            </p>
            <div class="actions">
                <a class="button" href="{{ route('register') }}">Comecar agora</a>
                <a class="button button-secondary" href="{{ route('login') }}">Entrar</a>
            </div>
        </div>
    </section>
</x-layouts.app>
