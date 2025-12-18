<x-layout.app title="VS Punk" :hideHands="true">
    <x-header />

    <main class="main-content">

        <img src="{{ asset('images/asset/1.png') }}" alt="Doodle Eye" class="sticker eye-doodle">
        <img src="{{ asset('images/asset/3.png') }}" alt="Lightning Pink" class="sticker lightning-pink">
        <img src="{{ asset('images/asset/4.png') }}" alt="Skull Sketch" class="sticker skull-doodle">
        <img src="{{ asset('images/asset/5.png') }}" alt="Fire Pink" class="sticker fire-pink">

        <div class="search-section">
            <form action="{{ route('articles.index') }}" method="GET" class="search-bar">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>

                <input
                        type="text"
                        name="searchT"
                        placeholder="Rechercher un article"
                        value="{{ $searchT ?? '' }}"
                >
            </form>
        </div>


        <div class="cards-decoration-container">

            <img src="{{ asset('images/asset/2.png') }}" alt="" class="cards-sticker sticker-skull-left">
            <img src="{{ asset('images/asset/t2.png') }}" alt="" class="cards-sticker sticker-lines-top-right">
            <img src="{{ asset('images/asset/t3.png') }}" alt="" class="cards-sticker sticker-lines-bottom-left">
            <img src="{{ asset('images/asset/3.png') }}" alt="" class="cards-sticker sticker-fire-right">


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
                                ">
                        <p style="font-size: 24px; font-weight: bold; margin-bottom: 10px; color: #000;">
                            🎸 Aucun article punk pour le moment
                        </p>
                        <p style="color: #666;">Soyez le premier à faire du bruit !</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="see-more-section">
            <img src="{{ asset('images/asset/6.png') }}" alt="Arrow" class="arrow-doodle">
            <a href="{{ route('articles.index') }}" class="btn btn-beige" id="btn-voir-plus">
                Voir plus
            </a>
        </div>
    </main>
    <x-footer />

</x-layout.app>