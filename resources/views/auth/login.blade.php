<x-layout.app title="Connexion">
    <div class="auth-page">
        <!-- Header punk -->
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo">Logo</a>
            <x-nav></x-nav>
        </header>

        <div class="auth-container">
            <img src="{{ asset('images/asset/1.png') }}" alt="" class="auth-sticker auth-sticker-1"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/asset/4.png') }}" alt="" class="auth-sticker auth-sticker-2"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/asset/3.png') }}" alt="" class="auth-sticker auth-sticker-3"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/asset/5.png') }}" alt="" class="auth-sticker auth-sticker-4"
                onerror="this.style.display='none'">

            <div class="auth-card">
                <h1>Connexion</h1>

                @if($errors->any())
                    <div class="auth-errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="votre@email.com"
                            value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required placeholder="••••••••">
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>

                    <button type="submit" class="btn-submit">Se connecter</button>
                </form>

                <p class="auth-link">
                    Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a>
                </p>
            </div>
        </div>

        <x-footer></x-footer>
    </div>
</x-layout.app>