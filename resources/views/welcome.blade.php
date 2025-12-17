@php use App\Models\Article; @endphp

<x-layout.app>
    {{-- ==================== HERO SECTION ==================== --}}
    <section class="hero-section" id="hero">
        {{-- Image de fond --}}
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855891372081330/imgfond.png?ex=69440e58&is=6942bcd8&hm=633bce47fbe9c4fa9fec6db173e27383b57ddfb01872f8fc3af7050e9e4ed82c&" 
             alt="Concert punk" 
             class="hero-image">
        <div class="hero-overlay"></div>
        
        {{-- Boutons sur la gauche --}}
        <div class="hero-buttons">
            <a href="#" class="hero-btn" title="Découvrir">
                <span>🎸</span>
            </a>
            <a href="#" class="hero-btn" title="Écouter">
                <span>🎵</span>
            </a>
        </div>
        
        {{-- Navigation en haut à droite --}}
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
        
        {{-- Indicateur de scroll --}}
        <div class="scroll-indicator">
            <a href="#content">↓</a>
        </div>
        
        {{-- Éléments décoratifs punk --}}
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855891372081330/imgfond.png" 
             alt="" class="punk-deco eye" style="display:none;">
    </section>

    {{-- ==================== MAIN CONTENT ==================== --}}
    <section class="main-content" id="content">
        {{-- Barre de recherche --}}
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" 
                   class="search-bar" 
                   placeholder="Rechercher"
                   id="search-input">
        </div>
        
        {{-- Grille des articles --}}
        <div class="articles-grid">
            @php
                $articles = Article::with('editeur')->latest()->take(2)->get();
            @endphp
            
            @forelse($articles as $article)
                <article class="article-card">
                    @if($article->image)
                        <img src="{{ asset($article->image) }}" 
                             alt="{{ $article->titre }}" 
                             class="article-card-image">
                    @else
                        <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" 
                             alt="Image par défaut" 
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
                {{-- Articles par défaut si aucun n'existe --}}
                <article class="article-card">
                    <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" 
                         alt="Article 1" 
                         class="article-card-image">
                    <div class="article-card-content">
                        <p class="article-card-description">description ...</p>
                        <p class="article-card-author">Par:</p>
                    </div>
                </article>
                <article class="article-card">
                    <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" 
                         alt="Article 2" 
                         class="article-card-image">
                    <div class="article-card-content">
                        <p class="article-card-description">description ...</p>
                        <p class="article-card-author">Par:</p>
                    </div>
                </article>
            @endforelse
        </div>
        
        {{-- Bouton Voir plus --}}
        <div class="voir-plus-container">
            <span class="arrow-icon">⟹</span>
            <a href="{{ route('articles.index') }}" class="btn-voir-plus">Voir plus</a>
        </div>
    </section>

    {{-- ==================== FOOTER ==================== --}}
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