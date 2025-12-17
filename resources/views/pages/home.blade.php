<x-layout.app title="Accueil">
    <x-header/>

    <div style="
        display:grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap:20px;
        padding:20px;
    ">
        @foreach($articles as $article)
            <x-article-card :article="$article" />
        @endforeach
    </div>

    <div>
        <a href="{{ route('articles.index') }}">
            Voir plus d’articles
        </a>
    </div>
</x-layout.app>
