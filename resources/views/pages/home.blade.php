<x-layout.app title="VS Punk - Plateforme de publication musicale">

    <!-- Header avec image de fond et navigation -->
    <header class="header">
        <nav class="top-buttons">
            <a href="{{ route('test-vite') }}" class="btn btn-black" id="btn-creer">Créer</a>
            @auth
                <a href="{{ route('logout') }}" 
                   class="btn btn-black" 
                   id="btn-connecter"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Se déconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-black" id="btn-connecter">Se connecter</a>
            @endauth
        </nav>

        <div class="hero-image-container">
            <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855891372081330/imgfond.png?ex=69440e58&is=6942bcd8&hm=633bce47fbe9c4fa9fec6db173e27383b57ddfb01872f8fc3af7050e9e4ed82c&" alt="Punk Concert" class="hero-img">
            <div class="torn-paper-edge"></div>
        </div>

        <!-- Logo punk jaune "4D" à gauche - sur l'image -->
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855916500160582/2.png?ex=69440e5e&is=6942bcde&hm=ee34ee0f35ae94dea39f20037a0710e800ea96ae5cd356b26f263bed3344a571&" alt="Logo Punk 4D" class="sticker logo-punk">
    </header>

    <!-- Contenu principal -->
    <main class="main-content">

        <!-- Stickers décoratifs positionnés de manière absolue -->
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855916063817870/1.png?ex=69440e5d&is=6942bcdd&hm=bd949426e466ae371addbd8124ae01b818a42b6e8c147b15099eb869ce8ee425&" alt="Doodle Eye" class="sticker eye-doodle">
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855917024444446/3.png?ex=69440e5e&is=6942bcde&hm=272cf21fce2d5064127e4cb6e4f0449c7d840e8ca1ea264f10a8609e5c574c73&" alt="Lightning Pink" class="sticker lightning-pink">
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855917628428289/4.png?ex=69440e5e&is=6942bcde&hm=9d1f80c1d4434a70ab31e3000b62cd01988681093f90a573b9bd370dacf60605&" alt="Skull Sketch" class="sticker skull-doodle">
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855918375010447/5.png?ex=69440e5e&is=6942bcde&hm=c4a8cadb04c86e2d16bd09118ebd21d8b9e9072810719b32a33bafe5177cb42e&" alt="Fire Pink" class="sticker fire-pink">

        <!-- Barre de recherche -->
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

        <!-- Cartes d'albums -->
        <div class="cards-container">
            @forelse($articles as $article)
                <article class="card" id="card-{{ $article->id }}">
                    <div class="card-img-holder">
                        <span class="card-badge">tire</span>
                        @if($article->image)
                            <img src="{{ asset($article->image) }}" alt="{{ $article->titre }}">
                        @else
                            <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" alt="Image par défaut">
                        @endif
                        <div class="album-overlay">
                            <div class="album-title-wrapper punk-style">
                                <h3 class="album-title">{{ Str::limit($article->titre ?? 'pUNk', 15) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="desc">{{ Str::limit($article->texte ?? 'description ...', 30) }}</p>
                        <p class="author">Par: {{ $article->editeur->name ?? '' }}</p>
                    </div>
                </article>
            @empty
                <!-- Carte 1 par défaut -->
                <article class="card" id="card-1">
                    <div class="card-img-holder">
                        <span class="card-badge">tire</span>
                        <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" alt="Album PUNK">
                        <div class="album-overlay">
                            <div class="album-title-wrapper punk-style">
                                <h3 class="album-title">pUNk</h3>
                                <div class="album-subtitle">100%<br>Authntik<br>Fake</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="desc">description ...</p>
                        <p class="author">Par:</p>
                    </div>
                </article>

                <!-- Carte 2 par défaut -->
                <article class="card" id="card-2">
                    <div class="card-img-holder">
                        <span class="card-badge">tire</span>
                        <img src="{{ Vite::asset('resources/images/logo1000x1000.jpg') }}" alt="Album THE SIMULATION">
                        <div class="album-overlay">
                            <div class="album-title-wrapper simulation-style">
                                <h3 class="album-title-alt">THE SIMULATION</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="desc">description ...</p>
                        <p class="author">Par:</p>
                    </div>
                </article>
            @endforelse
        </div>

        <!-- Section Voir Plus -->
        <div class="see-more-section">
            <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855918832062534/6.png?ex=69440e5e&is=6942bcde&hm=f4284f05e1a63d8b175a06fffa950c65d6dfc76bb27df6f662977ef76ee7d9dc&" alt="Arrow" class="arrow-doodle">
            <a href="{{ route('articles.index') }}" class="btn btn-beige" id="btn-voir-plus">Voir plus</a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <h3>VS Punk</h3>
            <p>
                Plateforme de publication musicale réalisée dans le cadre du Marathon du Web – IUT de Lens.
                Projet pédagogique mêlant création de contenu, design et développement web.
            </p>
            <p class="copyright">© {{ date('Y') }} – Équipe 2 VS Punk • Tous droits réservés</p>
        </div>
    </footer>

</x-layout.app>
