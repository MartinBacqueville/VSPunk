{{-- Message de gaspard cette page ne sert a rien on utilise "home.blade.php" --}}


@php use App\Models\Article; @endphp

<x-layout.app>

    <section class="hero-section" id="hero">

        <img src="{{ asset('images/asset/imgfond.png') }}" alt="Concert punk" class="hero-image">
        <div class="hero-overlay"></div>


        <div class="hero-buttons">
            <a href="#" class="hero-btn" title="Découvrir">
                <span>🎸</span>
            </a>
            <a href="#" class="hero-btn" title="Écouter">
                <span>🎵</span>
            </a>
        </div>


        <nav class="hero-nav">
            <a href="{{ route('test-vite') }}">Créer</a>
            @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Se déconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Se connecter</a>
            @endauth
        </nav>


        <div class="scroll-indicator">
            <a href="#content">↓</a>
        </div>


        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855891372081330/imgfond.png" alt=""
            class="punk-deco eye" style="display:none;">
    </section>


    <section class="main-content" id="content">

        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-bar" placeholder="Rechercher" id="search-input">
        </div>


        <div class="articles-grid">
            @php
                $articles = Article::with('editeur')->latest()->take(2)->get();
            @endphp

            @forelse($articles as $article)
                <article class="article-card">
                    @if($article->image)
                        <img src="{{ asset($article->image) }}" alt="{{ $article->titre }}" class="article-card-image">
                    @else
                        <img src="{{ Vite::asset('code-marathon-2025/public/images/asset/1.png') }}" alt="Image par défaut"
                            class="article-card-image">
                    @endif
                    <div class="article-card-content">
                        <p class="article-card-description">
                            {{ Str::limit($article->titre ?? 'description ...', 50) }}
                        </p>
                        <p class="article-card-author">
                            Par: {{ $article->editeur->name ?? 'Anonyme' }}
                        </p>
                    </div>
                </article>
            @empty

                <article class="article-card">
                    <img src="{{ Vite::asset('code-marathon-2025/public/images/asset/1.png') }}" alt="Article 1"
                        class="article-card-image">
                    <div class="article-card-content">
                        <p class="article-card-description">description ...</p>
                        <p class="article-card-author">Par:</p>
                    </div>
                </article>
                <article class="article-card">
                    <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" alt="Article 2"
                        class="article-card-image">
                    <div class="article-card-content">
                        <p class="article-card-description">description ...</p>
                        <p class="article-card-author">Par:</p>
                    </div>
                </article>
            @endforelse
        </div>


        <div class="voir-plus-container">
            <span class="arrow-icon">⟹</span>
            <a href="{{ route('articles.index') }}" class="btn-voir-plus">Voir plus</a>
        </div>
    </section>


    <footer class="punk-footer">
        <div class="footer-content">
            <h2 class="footer-title">VS Punk</h2>
            <p class="footer-description">
                Plateforme de publication musicale réalisée dans le cadre du Marathon du Web – IUT de Lens.
                Projet pédagogique mêlant création de contenu, design et développement web.
            </p>
            <p class="footer-copyright">
                © {{ date('Y') }} – Équipe 2 VS Punk • Tous droits réservés
            </p>
        </div>
    </footer>
</x-layout.app>