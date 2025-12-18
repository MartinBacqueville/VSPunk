<x-layout.app title="{{ $article->titre }}">
    <div class="article-show-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo Vertical.svg') }}"
                    alt="VS Punk" class="logo-img"></a>
            <x-nav></x-nav>
        </header>

        <!-- Stickers décoratifs punk -->
        <img src="{{ asset('images/asset/Pics.png') }}" alt="" class="article-sticker sticker-pics">
        <img src="{{ asset('images/asset/Not dead.png') }}" alt="" class="article-sticker sticker-notdead">
        <img src="{{ asset('images/asset/Étoile.png') }}" alt="" class="article-sticker sticker-etoile">

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
                        <div class="media-player-section">
                            <h2>Écouter</h2>
                            <div class="media-player-container">
                                <div class="media-player-icon">🎵</div>
                                <audio controls class="punk-audio-player">
                                    <source src="{{ $article->media }}">
                                    Votre navigateur ne supporte pas l'audio.
                                </audio>
                            </div>
                        </div>
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

                            $aDejaCommente = $article->avis
                                ->where('user_id', auth()->id())
                                ->isNotEmpty();

                            $likesCount = $article->likes->where('pivot.nature', 'like')->count();
                            $dislikesCount = $article->likes->where('pivot.nature', 'dislike')->count();
                        @endphp

                        <div class="reactions-section">
                            <div class="reactions-buttons">
                                <form method="POST" action="{{ route('articles.like', $article) }}">
                                    @csrf
                                    <input type="hidden" name="nature" value="like">
                                    <button type="submit"
                                        class="reaction-btn reaction-like {{ $userReaction === 'like' ? 'active' : '' }}">
                                        <span class="reaction-icon">👍</span>
                                        <span class="reaction-text">Like</span>
                                        <span class="reaction-count">{{ $likesCount }}</span>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('articles.like', $article) }}">
                                    @csrf
                                    <input type="hidden" name="nature" value="dislike">
                                    <button type="submit"
                                        class="reaction-btn reaction-dislike {{ $userReaction === 'dislike' ? 'active' : '' }}">
                                        <span class="reaction-icon">👎</span>
                                        <span class="reaction-text">Dislike</span>
                                        <span class="reaction-count">{{ $dislikesCount }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>


                        @if (!$aDejaCommente)
                            <div class="comment-form-section">
                                <h3>Laisser un commentaire</h3>

                                <form method="POST" action="{{ route('articles.comment', $article) }}" class="comment-form">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="contenu" rows="4" required class="comment-textarea"
                                            placeholder="Écrivez votre commentaire punk ici..."></textarea>
                                    </div>
                                    <button type="submit" class="btn-comment-submit">🎸 Publier</button>
                                </form>
                            </div>
                        @else
                            <p class="already-commented"><em>✓ Vous avez déjà commenté cet article.</em></p>
                        @endif
                    @endauth

                    <div class="comments-section">
                        <h3>Commentaires</h3>

                        @forelse ($article->avis as $avis)
                            <div class="comment-item">
                                <div class="comment-header">
                                    <span class="comment-author">{{ $avis->user->name }}</span>
                                </div>
                                <p class="comment-content">{{ $avis->contenu }}</p>

                                @auth
                                    @if ($avis->user_id === auth()->id())
                                        <form method="POST" action="{{ route('avis.destroy', $avis) }}" class="comment-delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete-comment">🗑️ Supprimer</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @empty
                            <p class="no-comments">Aucun commentaire pour le moment.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
        @auth
            @if(auth()->id() === $article->editeur->id && $article->en_ligne == 0)
                <div class="article-actions">
                    <form method="POST" action="{{ route('articles.publish', $article->id) }}">
                        @csrf
                        <button type="submit" class="btn-article-action btn-publish">
                            🚀 Publier l'article
                        </button>
                    </form>
                </div>
            @endif
        @endauth

        <div class="articles-see-more">
            @auth
                @if(auth()->id() === $article->editeur->id)
                    <a href="{{ route('articles.edit', $article) }}" class="btn-see-more btn-edit-article">✏️ Éditer
                        l'article</a>
                @endif
            @endauth
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