<x-layout.app title="Tous les articles">
    <div class="articles-page">

        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo Vertical.svg') }}"
                    alt="VS Punk" class="logo-img"></a>
            <x-nav></x-nav>
        </header>


        <div class="articles-search-section">
            <img src="{{ asset('images/stickers/lightning.png') }}" alt="" class="articles-sticker sticker-lightning"
                onerror="this.style.display='none'">
            <img src="{{ asset('images/stickers/skull.png') }}" alt="" class="articles-sticker sticker-skull"
                onerror="this.style.display='none'">

        </div>


        <form action="{{ route('articles.index') }}" method="GET" class="articles-filter-form">
            <div class="filter-row">
                <label for="searchT">Titre :</label>
                <input type="text" id="searchT" name="searchT" placeholder="Rechercher un article..."
                    value="{{ request('searchT') }}">
            </div>
            <div class="filter-row">
                <label for="searchA">Auteur :</label>
                <input type="text" id="searchA" name="searchA" placeholder="Rechercher un auteur..."
                    value="{{ request('searchA') }}">
            </div>
            <div class="filter-row">
                <label for="searchR">Rythme :</label>
                <input type="text" id="searchR" name="searchR" placeholder="Rechercher un rythme..."
                    value="{{ request('searchR') }}">
            </div>
            <div class="filter-row">
                <label for="searchAccess">Accessibilité :</label>
                <input type="text" id="searchAccess" name="searchAccess" placeholder="Rechercher une accessibilité..."
                    value="{{ request('searchAccess') }}">
            </div>
            <button type="submit" class="submit-btn">Filtrer</button>
        </form>



        <div class="cards-decoration-container">

            <img src="{{ asset('images/asset/2.png') }}" alt="" class="cards-sticker sticker-skull-left">
            <img src="{{ asset('images/asset/t2.png') }}" alt="" class="cards-sticker sticker-lines-top-right">
            <img src="{{ asset('images/asset/t3.png') }}" alt="" class="cards-sticker sticker-lines-bottom-left">
            <img src="{{ asset('images/asset/3.png') }}" alt="" class="cards-sticker sticker-fire-right">


            <div class="articles-grid">
                @foreach($articles as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>



        <div class="articles-see-more">
            <svg class="arrow-svg" viewBox="0 0 80 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 20 Q20 15, 35 20 T65 20" stroke="#d4c4a8" stroke-width="3" fill="none"
                    stroke-linecap="round" />
                <path d="M55 12 L70 20 L55 28" stroke="#d4c4a8" stroke-width="3" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <a href="{{ route('accueil') }}" class="btn-see-more">Retour à l'accueil</a>
        </div>
    </div>

    <script>
        function filterArticles(value) {

            const cards = document.querySelectorAll('.article-card-punk');
            cards.forEach(card => {
                const title = card.querySelector('.card-title')?.textContent.toLowerCase() || '';
                const author = card.querySelector('.card-author')?.textContent.toLowerCase() || '';
                if (title.includes(value.toLowerCase()) || author.includes(value.toLowerCase())) {
                    card.style.display = 'block';
                } else {
                    card.style.display = value ? 'none' : 'block';
                }
            });
        }
    </script>
    <x-footer></x-footer>
</x-layout.app>