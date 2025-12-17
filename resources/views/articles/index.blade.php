<x-layout.app title="Tous les articles">
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
        <a href="{{ route('accueil') }}">
            Voir moins
        </a>
    </div>
</x-layout.app>
