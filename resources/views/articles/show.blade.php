<x-layout.app title="{{ $article->titre }}">
    <div class="article-show-page">
        <!-- Header punk -->
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo">Logo</a>
            <div class="nav-buttons">
                @auth
                    <a href="{{ route('articles.create') }}" class="btn-outline">ajouter un article</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-outline">Déconnexion</button>
                    </form>
                    <div class="avatar"></div>
                @else
                    <a href="{{ route('login') }}" class="btn-outline">Connexion</a>
                @endauth
            </div>
        </header>

        <div class="article-show-container">
            <div class="article-show-card">
                <!-- Header de l'article avec image et métadonnées -->
                <div class="article-show-header">
                    @if($article->image)
                        <div class="article-show-image">
                            <img src="{{ asset($article->image) }}" alt="{{ $article->titre }}">
                        </div>
                    @endif

                    <div class="article-show-meta">
                        <h1>{{ $article->titre }}</h1>
                        <p class="author">
                            Par : <strong>{{ $article->editeur->name }}</strong>
                        </p>
                        @if($article->rythme)
                            <span class="category-badge">{{ $article->rythme->texte }}</span>
                        @endif
                    </div>
                </div>

                <!-- Contenu de l'article -->
                <div class="article-show-content">
                    <h2>Résumé</h2>
                    <p>{{ $article->resume }}</p>

                    <h2>Article</h2>
                    <p>{!! $article->texte !!}</p>

                    @if($article->media)
                        <h2>Media</h2>
                        <audio controls>
                            <source src="{{ $article->media }}">
                            Votre navigateur ne supporte pas l'audio.
                        </audio>
                    @endif

                    <h2>Caractéristiques musicales</h2>
                    <ul>
                        <li><strong>Rythme :</strong> {{ $article->rythme->texte ?? 'Non défini' }}</li>
                        <li><strong>Accessibilité :</strong> {{ $article->accessibilite->texte ?? 'Non définie' }}</li>
                        <li><strong>Conclusion :</strong> {{ $article->conclusion->texte ?? 'Non définie' }}</li>
                    </ul>

                    <p style="margin-top: 20px; opacity: 0.7;">
                        Nombre de vues : {{ $article->nb_vues }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Section retour -->
        <div class="articles-see-more">
            <svg class="arrow-svg" viewBox="0 0 80 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                style="transform: scaleX(-1);">
                <path d="M5 20 Q20 15, 35 20 T65 20" stroke="#d4c4a8" stroke-width="3" fill="none"
                    stroke-linecap="round" />
                <path d="M55 12 L70 20 L55 28" stroke="#d4c4a8" stroke-width="3" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <a href="{{ route('articles.index') }}" class="btn-see-more">Retour aux articles</a>
        </div>

        <!-- Footer -->
        <footer class="articles-footer">
            <h3>VS Punk</h3>
            <p>Plateforme de publication musicale réalisée dans le cadre du Marathon du Web – IUT de Lens. Projet
                pédagogique mêlant création de contenu, design et développement web.</p>
            <p class="copyright">© 2025 – Équipe 2 VS Punk • Tous droits réservés</p>
        </footer>
    </div>
</x-layout.app>