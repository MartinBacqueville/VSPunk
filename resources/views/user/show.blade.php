<x-layout.app title="Profil de {{ $user->name }}">
    <div class="user-profile-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo_Vertical.svg') }}" alt="VS Punk" class="logo-img"></a>
            <div class="nav-buttons">
                @auth
                    <a href="{{ route('articles.create') }}" class="btn-outline">ajouter un article</a>
                    <a href="{{ route('profile.show', auth()->id()) }}" class="btn-outline">{{ auth()->user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-outline">Déconnexion</button>
                    </form>
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
                        <div class="user-stats">
                            <span class="user-stat"><strong>{{ $user->suiveurs->count() }}</strong> followers</span>
                            <span class="user-stat"><strong>{{ $user->suivis->count() }}</strong> suivis</span>
                        </div>
                    </div>
                </div>

                <div class="user-section">
                    <h2>Préférences</h2>

                    <h3>Articles qu'il aime :</h3>
                    @if($user->likes->count())
                        <ul class="liked-articles-list">
                            @foreach($user->likes as $article)
                                <li class="liked-article-item">
                                    @if($article->image)
                                        <img src="{{ asset($article->image) }}" alt="{{ $article->titre }}">
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

                    <h3>Top 3 rythmes/ambiances préférés :</h3>
                    <ul class="rythme-list">
                        @forelse(
                            $user->likes
                                ->pluck('rythme')
                                ->filter()
                                ->groupBy('id')
                                ->sortByDesc(fn($group) => $group->count())
                                ->take(3)
                            as $rythmeGroup)
                            <li class="rythme-item">
                                @if($rythmeGroup->first()->image)
                                    <img src="{{ $rythmeGroup->first()->image }}" alt="{{ $rythmeGroup->first()->texte }}">
                                @endif
                                {{ $rythmeGroup->first()->texte }}
                                <span class="rythme-count">{{ $rythmeGroup->count() }} likes</span>
                            </li>
                        @empty
                            <p class="empty-message">Aucun rythme enregistré.</p>
                        @endforelse
                    </ul>
                </div>

                <div class="follow-button-container">
               
                    <x-follow-button :user="$user" />
 
                                   </div>
 
                               </div>
        </div>

        <div class="articles-see-more">
            <svg class="arrow-svg" viewBox="0 0 80 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: scaleX(-1);">
                <path d="M5 20 Q20 15, 35 20 T65 20" stroke="#d4c4a8" stroke-width="3" fill="none" stroke-linecap="round"/>
                <path d="M55 12 L70 20 L55 28" stroke="#d4c4a8" stroke-width="3" fill="none" stroke-linecap="roun
               d" stroke-linejoin="round"/>
            </svg>
            <a href="{{ route('articles.index') }}" class="btn-see-more">Retour aux articles</a>
        </div>

        <x-footer/>
    </div>
</x-layout.app>
