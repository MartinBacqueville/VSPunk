<x-layout.app title="VS Punk">

    <header class="header">
        <nav class="top-buttons">
            <a href="{{ route('test-vite') }}" class="btn btn-black" id="btn-creer">Créer</a>
            @auth
                <a href="{{ route('logout') }}" class="btn btn-black" id="btn-connecter"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Se déconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-black" id="btn-connecter">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-black" id="btn-register">S'inscrire</a>
            @endauth
        </nav>

        <div class="hero-image-container">
            <img src="{{ asset('images/asset/imgfond.png') }}" alt="Punk Concert" class="hero-img">
            <div class="torn-paper-edge"></div>
        </div>

        <img src="{{ asset('images/asset/2.png') }}" alt="Logo Punk 4D" class="sticker logo-punk"> // Note a moi meme
        "Gaspard" ajoute ça apres
    </header>

    <main class="main-content">

        <img src="{{ asset('images/asset/1.png') }}" alt="Doodle Eye" class="sticker eye-doodle">
        <img src="{{ asset('images/asset/3.png') }}" alt="Lightning Pink" class="sticker lightning-pink">
        <img src="{{ asset('images/asset/4.png') }}" alt="Skull Sketch" class="sticker skull-doodle">
        <img src="{{ asset('images/asset/5.png') }}" alt="Fire Pink" class="sticker fire-pink">

        <div class="search-section">
            <div class="search-bar">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <input type="text" placeholder="Rechercher" id="search-input">
            </div>
        </div>

        <div class="articles-grid">
            @forelse($articles as $article)
                <x-article-card :article="$article" />
            @empty
                <div style="
                        grid-column: 1 / -1;
                        text-align: center;
                        padding: 60px 20px;
                        background: #f5e6d3;
                        border: 3px dashed #000;
                        border-radius: 12px;
                    ">
                    <p style="font-size: 24px; font-weight: bold; margin-bottom: 10px; color: #000;">
                        🎸 Aucun article punk pour le moment
                    </p>
                    <p style="color: #666;">Soyez le premier à faire du bruit !</p>
                </div>
            @endforelse
        </div>

        <div class="see-more-section">
            <img src="{{ asset('images/asset/6.png') }}" alt="Arrow" class="arrow-doodle">
            <a href="{{ route('articles.index') }}" class="btn btn-beige" id="btn-voir-plus">Voir plus</a>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <h3>VS Punk</h3>
            <p>
                Plateforme de publication musicale réalisée dans le cadre du Marathon du Web – IUT de Lens.
                Projet pédagogique mêlant création de contenu, design et développement web.
            </p>
            <p class="copyright">© {{ date('Y') }} – Équipe 2 VSPunk • Tous droits réservés</p>
        </div>
    </footer>

</x-layout.app>