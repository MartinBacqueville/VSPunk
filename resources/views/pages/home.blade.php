<x-layout.app title="VS Punk">

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
                <a href="{{ route('register') }}" class="btn btn-black" id="btn-register">S'inscrire</a>
            @endauth
        </nav>

        <div class="hero-image-container">
            <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855891372081330/imgfond.png?ex=69440e58&is=6942bcd8&hm=633bce47fbe9c4fa9fec6db173e27383b57ddfb01872f8fc3af7050e9e4ed82c&" alt="Punk Concert" class="hero-img">
            <div class="torn-paper-edge"></div>
        </div>

        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855916500160582/2.png?ex=69440e5e&is=6942bcde&hm=ee34ee0f35ae94dea39f20037a0710e800ea96ae5cd356b26f263bed3344a571&" alt="Logo Punk 4D" class="sticker logo-punk">
    </header>

    <main class="main-content">

        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855916063817870/1.png?ex=69440e5d&is=6942bcdd&hm=bd949426e466ae371addbd8124ae01b818a42b6e8c147b15099eb869ce8ee425&" alt="Doodle Eye" class="sticker eye-doodle">
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855917024444446/3.png?ex=69440e5e&is=6942bcde&hm=272cf21fce2d5064127e4cb6e4f0449c7d840e8ca1ea264f10a8609e5c574c73&" alt="Lightning Pink" class="sticker lightning-pink">
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855917628428289/4.png?ex=69440e5e&is=6942bcde&hm=9d1f80c1d4434a70ab31e3000b62cd01988681093f90a573b9bd370dacf60605&" alt="Skull Sketch" class="sticker skull-doodle">
        <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855918375010447/5.png?ex=69440e5e&is=6942bcde&hm=c4a8cadb04c86e2d16bd09118ebd21d8b9e9072810719b32a33bafe5177cb42e&" alt="Fire Pink" class="sticker fire-pink">

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

        <div class="cards-container" style="
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        ">
            @forelse($articles as $article)
                <x-article-card-punk-wrapper :article="$article" />
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
            <img src="https://cdn.discordapp.com/attachments/1449131154018926733/1450855918832062534/6.png?ex=69440e5e&is=6942bcde&hm=f4284f05e1a63d8b175a06fffa950c65d6dfc76bb27df6f662977ef76ee7d9dc&" alt="Arrow" class="arrow-doodle">
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