@props(['article'])

<div class="article-card-punk">
    <div class="card-top">
        @if($article->image)
            <div class="card-image">
                <img src="{{ asset($article->image) }}" alt="{{ $article->titre }}">
            </div>
        @endif

        <div class="card-info">
            <a href="{{ route('articles.show', $article) }}" class="card-title">
                {{ $article->titre }}
            </a>
            <p class="card-author">
                Par : <a href="{{ route('user.show', $article->editeur->id) }}">{{ $article->editeur->name }}</a>
            </p>
            @if($article->rythme)
                <span class="card-category">{{ $article->rythme->texte }}</span>
            @endif
        </div>
    </div>

    <div class="card-description">
        <p>{{ Str::limit($article->texte, 200) }}</p>
    </div>

    <div class="card-tags">
        @if($article->rythme)
            <a href="{{ route('articles.index', ['searchR' => $article->rythme->texte]) }}" class="tag">
                {{ $article->rythme->texte }}
            </a>
        @endif
        @if($article->accessibilite)
            <a href="{{ route('articles.index', ['searchAccess' => $article->accessibilite->texte]) }}" class="tag">
                {{ $article->accessibilite->texte }}
            </a>
        @endif
    </div>
</div>