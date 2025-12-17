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
            <a href="{{ route('auteurs.show', $article->editeur) }}">
                {{ $article->editeur->name }}
            </a>
        </p>

        <ul >
            <li>Rythme : {{ $article->rythme->texte ?? 'Non défini' }}</li>
            <li>Accessibilité : {{ $article->accessibilite->texte ?? 'Non définie' }}</li>
        </ul>

        <p >
            {{ Str::limit($article->texte, 120) }}
        </p>
    </div>
</div>
