<x-layout.app title="Créer un compte">
    <div class="auth-page">

        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo Vertical.svg') }}"
                    alt="VS Punk" class="logo-img"></a>
            <x-nav></x-nav>
        </header>

        <div class="auth-container">

            <img src="{{ asset('images/asset/3.png') }}" alt="" class="auth-sticker auth-sticker-1"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/asset/1.png') }}" alt="" class="auth-sticker auth-sticker-2"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/asset/5.png') }}" alt="" class="auth-sticker auth-sticker-3"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/asset/4.png') }}" alt="" class="auth-sticker auth-sticker-4"
                onerror="this.style.display='none'">

            <div class="auth-card">
                <h1>Créer un compte</h1>

                @if($errors->any())
                    <div class="auth-errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" required placeholder="Votre nom"
                            value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="votre@email.com"
                            value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required placeholder="••••••••">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le mot de passe</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            placeholder="••••••••">
                    </div>

                    <button type="submit" class="btn-submit">S'inscrire</button>
                </form>

                <p class="auth-link">
                    Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
                </p>
            </div>
        </div>

        <x-footer></x-footer>
    </div>
</x-layout.app>