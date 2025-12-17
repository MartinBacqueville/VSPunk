<x-layout.app title="{{ $article->titre }}">
    <div class="article-show-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo">Logo</a>
            <x-nav></x-nav>
        </header>

        <div class="article-show-container">
            <div class="article-show-card">
                <div class="article-show-header">
                    @if($article->image)
                        <div class="article-show-image">
                            <img src="{{ asset($article->image) }}" alt="{{ $article->titre }}">
                        </div>
                    @endif

                    <div class="article-show-meta">
                        <h1>{{ $article->titre }}</h1>
                        <p class="author">
                            Par : <strong>{{ $article->editeur->name }}</strong>
                        </p>
                        @if($article->rythme)
                            <span class="category-badge">{{ $article->rythme->texte }}</span>
                        @endif
                    </div>
                </div>

                <div class="article-show-content">
                    <h2>Résumé</h2>
                    <p>{{ $article->resume }}</p>

                    <h2>Article</h2>
                    <p>{!! $article->texte !!}</p>

                    @if($article->media)
                        <h2>Media</h2>
                        <audio controls>
                            <source src="{{ $article->media }}">
                            Votre navigateur ne supporte pas l'audio.
                        </audio>
                    @endif

                    <h2>Caractéristiques musicales</h2>
                    <ul>
                        <li><strong>Rythme :</strong> {{ $article->rythme->texte ?? 'Non défini' }}</li>
                        <li><strong>Accessibilité :</strong> {{ $article->accessibilite->texte ?? 'Non définie' }}</li>
                        <li><strong>Conclusion :</strong> {{ $article->conclusion->texte ?? 'Non définie' }}</li>
                    </ul>

                    <p style="margin-top: 20px; opacity: 0.7;">
                        Nombre de vues : {{ $article->nb_vues }}
                    </p>

                    @auth
                        @php
                            $userReaction = $article->likes
                                ->where('id', auth()->id())
                                ->first()
                                ->pivot->nature ?? null;

                            $likesCount = $article->likes->where('pivot.nature', 'like')->count();
                            $dislikesCount = $article->likes->where('pivot.nature', 'dislike')->count();
                        @endphp

                        <div style="margin-top: 20px;">
                            <form method="POST" action="{{ route('articles.like', $article) }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="nature" value="like">
                                <button type="submit">
                                    👍 Like {{ $userReaction === 'like' ? '(actif)' : '' }}
                                </button>
                            </form>

                            <form method="POST" action="{{ route('articles.like', $article) }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="nature" value="dislike">
                                <button type="submit">
                                    👎 Dislike {{ $userReaction === 'dislike' ? '(actif)' : '' }}
                                </button>
                            </form>

                            <p>
                                👍 {{ $likesCount }} likes |
                                👎 {{ $dislikesCount }} dislikes
                            </p>
                        </div>
                    @endauth

                </div>
            </div>
        </div>

        <div class="articles-see-more">
            <svg class="arrow-svg" viewBox="0 0 80 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                style="transform: scaleX(-1);">
                <path d="M5 20 Q20 15, 35 20 T65 20" stroke="#d4c4a8" stroke-width="3" fill="none"
                    stroke-linecap="round" />
                <path d="M55 12 L70 20 L55 28" stroke="#d4c4a8" stroke-width="3" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <a href="{{ route('articles.index') }}" class="btn-see-more">Retour aux articles</a>
        </div>
    </div>
    <x-footer></x-footer>
</x-layout.app>