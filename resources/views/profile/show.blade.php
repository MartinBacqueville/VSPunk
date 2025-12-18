<x-layout.app title="Mon profil">
    <div class="user-profile-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo Vertical.svg') }}" alt="VS Punk" class="logo-img"></a>
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

        <div class="user-profile-container">
            <div class="user-profile-card">
                <div class="user-profile-header">
                    <div class="user-avatar">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="Avatar de {{ $user->name }}">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar par défaut">
                        @endif
                    </div>
                    <div class="user-info">
                        <h1>{{ $user->name }}</h1>
                        <p class="user-email">{{ $user->email }}</p>
                        <p class="user-date">Inscrit le {{ $user->created_at->format('d/m/Y') }}</p>
                        <div class="user-stats">
                            <span class="user-stat"><strong>{{ $user->suiveurs->count() }}</strong> followers</span>
                            <span class="user-stat"><strong>{{ $user->suivis->count() }}</strong> suivis</span>
                        </div>
                    </div>
                </div>

                <div class="user-section">
                    <h2>Personnes que vous suivez</h2>
                    @if($user->suivis->count())
                        <ul class="liked-articles-list">
                            @foreach($user->suivis as $followed)
                                <li class="liked-article-item">
                                    <a href="{{ route('user.show', $followed->id) }}">
                                        {{ $followed->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="empty-message">Vous ne suivez encore personne.</p>
                    @endif
                </div>

                <div class="user-section">
                    <h2>Articles créés par vous</h2>
                    @if($user->mesArticles->count())
                        <ul class="liked-articles-list">
                            @foreach($user->mesArticles as $article)
                                <li class="liked-article-item">
                                    <a href="{{ route('articles.show', $article->id) }}">
                                        {{ $article->titre ?? 'Sans titre' }}
                                    </a>
                                    @if(!$article->en_ligne)
                                        <span class="tag" style="background: #ffbe0b; color: #000;">Brouillon</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="empty-message">Vous n'avez encore créé aucun article.</p>
                    @endif
                </div>

                @php
                    $drafts = $user->mesArticles->where('en_ligne', 0);
                @endphp

                @if($drafts->count())
                    <div class="user-section">
                        <h2>Brouillons</h2>
                        <ul class="liked-articles-list">
                            @foreach($drafts as $draft)
                                <li class="liked-article-item">
                                    {{ $draft->titre ?? 'Sans titre' }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="user-section">
                    <h2>Articles que vous aimez</h2>
                    @if($user->likes->count())
                        <ul class="liked-articles-list">
                            @foreach($user->likes as $article)
                                <li class="liked-article-item">
                                    @if($article->image)
                                        <img src="{{ $article->image }}" alt="{{ $article->titre }}">
                                    @endif
                                    <a href="{{ route('articles.show', $article->id) }}">
                                        {{ $article->titre }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="empty-message">Pas encore d'articles aimés.</p>
                    @endif
                </div>

                <div class="follow-button-container" style="gap: 15px;">
                    <a href="/" class="btn-follow">⬅ Retour à l'accueil</a>
                    <a href="{{ route('profile.edit') }}" class="btn-follow btn-unfollow">✏ Modifier le profil</a>
                </div>
            </div>
        </div>

        <footer class="articles-footer">
            <h3>VS Punk</h3>
            <p>Plateforme de publication musicale réalisée dans le cadre du Marathon du Web – IUT de Lens. Projet
                pédagogique mêlant création de contenu, design et développement web.</p>
            <p class="copyright">© 2025 – Équipe 2 VS Punk • Tous droits réservés</p>
        </footer>
    </div>
</x-layout.app>