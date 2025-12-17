<x-layout.app>
    <div>

        <div>

            <h1>
                Votre profil 👤
            </h1>

            <div>
                <img src="{{ $user->avatar ?? '/images/default-avatar.jpg' }}"
                     alt="Avatar"
                     class="w-24 h-24 rounded-full object-cover border border-gray-700 mx-auto mb-4">

                <p><span>Nom :</span> {{ $user->name }}</p>
                <p><span>Email :</span> {{ $user->email }}</p>
                <p><span>Inscrit le :</span> {{ $user->created_at->format('d/m/Y') }}</p>
            </div>

            <div>
                <span><strong>{{ $user->suiveurs->count() }}</strong> followers</span>
                <span><strong>{{ $user->suivis->count() }}</strong> suivis</span>
            </div>

            <h2>Personnes que vous suivez :</h2>

            @if($user->suivis->count())
                <ul>
                    @foreach($user->suivis as $followed)
                        <li>
                            <a href="{{ route('user.show', $followed->id) }}" >
                                {{ $followed->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Vous ne suivez encore personne.</p>
            @endif

            <h2>Articles créés par vous :</h2>

            @if($user->mesArticles->count())
                <ul>
                    @foreach($user->mesArticles as $article)
                        <li>
                            <a href="{{ route('articles.show', $article->id) }}">
                                {{ $article->titre ?? 'Sans titre' }}
                            </a>
                            @if(!$article->en_ligne)
                                <span style="color:orange;">(Brouillon)</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Vous n'avez encore créé aucun article.</p>
            @endif



            <h2>Articles en cours :</h2>

            @php
                $drafts = $user->mesArticles->where('en_ligne', 0);
            @endphp

            @if($drafts->count())
                <ul>
                    @foreach($drafts as $draft)
                        <li>{{ $draft->titre ?? 'Sans titre' }}</li>
                    @endforeach
                </ul>
            @else
                <p>Aucun brouillon pour le moment.</p>
            @endif


            <h2>Articles que vous aimez :</h2>

            @if($user->likes->count())
                <ul>
                    @foreach($user->likes as $article)
                        <li>
                            <a href="{{ route('articles.show', $article->id) }}">
                                {{ $article->titre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Pas encore d’articles aimés.</p>
            @endif

        </div>
        <div>
            <a href="/" >⬅ Retour à l’accueil</a>
            <a href="{{ route('profile.edit') }}" >✏ Modifier le profil</a>
        </div>
    </div>
</x-layout.app>
