@props(['article'])

<div style="
    border:1px solid #ddd;
    border-radius:8px;
    overflow:hidden;
    box-shadow:0 4px 8px rgba(0,0,0,0.08);
    background:white;
">

    @if($article->image)
        <img
                src="{{ asset($article->image) }}"
                alt="{{ $article->titre }}"
                style="
            width:100%;
            height:180px;
            object-fit:cover;
            display:block;
        "
        >
    @endif

    <div>
        <h2>
            <a href="{{ route('articles.show', $article) }}">
                {{ $article->titre }}
            </a>
        </h2>

        <p>
            Par
            <a href="{{ route('user.show', $article->editeur->id) }}">
                {{ $article->editeur->name }}
            </a>
        </p>

        <ul >
            <li>
                Rythme :
                @if($article->rythme)
                    <a href="{{ route('articles.index', ['searchR' => $article->rythme->texte]) }}">
                        {{ $article->rythme->texte }}
                    </a>
                @else
                    Non défini
                @endif
            </li>

            <li>
                Accessibilité :
                @if($article->accessibilite)
                    <a href="{{ route('articles.index', ['searchAccess' => $article->accessibilite->texte]) }}">
                        {{ $article->accessibilite->texte }}
                    </a>
                @else
                    Non définie
                @endif
            </li>

        </ul>

        <p >
            {{ Str::limit($article->texte, 120) }}
        </p>
    </div>
</div>
