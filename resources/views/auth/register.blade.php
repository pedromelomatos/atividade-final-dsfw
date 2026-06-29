<x-layouts.app title="Criar conta | Trilha Livre">
    <section class="auth-panel">
        <div>
            <p class="eyebrow">Nova conta</p>
            <h1>Criar conta de estudante</h1>
            <p class="muted">O perfil inicial criado pelo cadastro publico e estudante.</p>
        </div>

        <form class="form-card" method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Nome</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="password">Senha</label>
            <input id="password" name="password" type="password" required>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="password_confirmation">Confirmar senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required>

            <button class="button" type="submit">Criar conta</button>
            <p class="muted">Ja tem conta? <a href="{{ route('login') }}">Entrar</a></p>
        </form>
    </section>
</x-layouts.app>
