<x-layout.app>
    <h1>Profil de {{ $user->name }}</h1>
    @if($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar de {{ $user->name }}" width="150" height="150">
    @else
        <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar par défaut" width="150" height="150">
    @endif
    <p><strong>Nombre de followers :</strong> {{ $user->suiveurs->count() }}</p>
    <p><strong>Nombre de personnes suivies :</strong> {{ $user->suivis->count() }}</p>

    <h2>Préférences</h2>
    <h3>Articles qu'il aime :</h3>
    @if($user->likes->count())
        <ul>
            @foreach($user->likes as $article)
                <li>
                    <a href="{{ route('articles.show', $article->id) }}">
                        {{ $article->titre }}
                    </a>
                    @if($article->image)
                        <br>
                        <img src="{{ asset('storage' . $article->image) }}" alt="{{ $article->titre }}" width="100">
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Pas encore d’articles aimés.</p>
    @endif


    <h3>Top 3 rythmes préférés :</h3>

    <ul>
        @forelse(
            $user->likes
                ->pluck('rythme')
                ->filter()
                ->groupBy('id')
                ->map(fn($group) => ['rythme' => $group->first(), 'count' => $group->count()])
                ->sortByDesc('count')
                ->take(3)
            as $rythme
        )
            <li>
                <a href="{{ route('rythme.show', $rythme['rythme']->id) }}">
                    {{ $rythme['rythme']->texte }} ({{ $rythme['count'] }} likes)
                </a>
                @if(isset($rythme['rythme']->image))
                    <br>
                    <img src="{{ asset('storage' . $rythme['rythme']->image) }}" alt="{{ $rythme['rythme']->texte }}" width="100">
                @endif
            </li>
        @empty
            <p>Aucun rythme enregistré.</p>
        @endforelse
    </ul>



    @auth
        @if(auth()->id() !== $user->id)
        <form method="POST" action="{{ route('user.follow', $user->id) }}">
            @csrf
            @if(auth()->user()->suivis->contains($user->id))
                <button type="submit">Ne plus suivre</button>
            @else
                <button type="submit">Suivre</button>
            @endif
        </form>
        @endif
    @endauth
</x-layout.app>
