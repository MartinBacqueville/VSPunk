<x-layout.app title="Tous les articles">
    <x-header/>
    <form action="{{ route('articles.index') }}" method="GET" class="mb-12">
        <div class="flex items-center gap-4 bg-black/60 backdrop-blur-md p-5 rounded-2xl border border-white/20 w-full">
            <label for="searchT" class="text-gray-200 font-medium whitespace-nowrap">Titre :</label>
            <input type="text" id="searchT" name="searchT"
                   class="flex-1 px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400"
                   placeholder="Rechercher un article..." />
        </div>
        <div class="flex items-center gap-4 bg-black/60 backdrop-blur-md p-5 rounded-2xl border border-white/20 w-full">
            <label for="searchA" class="text-gray-200 font-medium whitespace-nowrap">Auteur :</label>
            <input type="text" id="searchA" name="searchA"
                   class="flex-1 px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400"
                   placeholder="Rechercher un auteur..." />
        </div>
        <div class="flex items-center gap-4 bg-black/60 backdrop-blur-md p-5 rounded-2xl border border-white/20 w-full">
            <label for="searchR" class="text-gray-200 font-medium whitespace-nowrap">Rythme :</label>
            <input type="text" id="searchR" name="searchR"
                   class="flex-1 px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400"
                   placeholder="Rechercher un rythme..." />
        </div>
        <div class="flex items-center gap-4 bg-black/60 backdrop-blur-md p-5 rounded-2xl border border-white/20 w-full">
            <label for="searchAccess" class="text-gray-200 font-medium whitespace-nowrap">Accessibilité :</label>
            <input type="text" id="searchAccess" name="searchAccess"
                   class="flex-1 px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400"
                   placeholder="Rechercher une accessibilité..." />
        </div>
        <div class="flex items-center gap-4 bg-black/60 backdrop-blur-md p-5 rounded-2xl border border-white/20 w-full">

            <button type="submit"
                    class="px-6 py-2 rounded-full bg-teal-500 hover:bg-teal-600 text-white font-semibold transition-all">
                Filtrer
            </button>
        </div>

    </form>
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
