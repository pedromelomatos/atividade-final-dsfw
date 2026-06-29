<x-layouts.app title="Entrar | Trilha Livre">
    <section class="auth-panel">
        <div>
            <p class="eyebrow">Acesso</p>
            <h1>Entrar na conta</h1>
            <p class="muted">Use seu e-mail e senha para continuar acompanhando suas trilhas.</p>
        </div>

        <form class="form-card" method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label for="password">Senha</label>
            <input id="password" name="password" type="password" required>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror

            <label class="checkbox">
                <input name="remember" type="checkbox" value="1">
                Manter conectado
            </label>

            <button class="button" type="submit">Entrar</button>
            <p class="muted">Ainda nao tem conta? <a href="{{ route('register') }}">Criar conta</a></p>
        </form>
    </section>
</x-layouts.app>
