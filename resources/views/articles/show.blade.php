<x-layout.app>
<h1>{{ $article->titre }}</h1>

<p>
    Écrit par <strong>{{ $article->editeur->name }}</strong>
</p>

<p>
    Nombre de vues : {{ $article->nb_vues }}
</p>

@if($article->image)
    <img src="{{ $article->image }}" alt="Image de l'article">
@endif

<h2>Résumé</h2>
<p>{{ $article->resume }}</p>

<h2>Article</h2>
<p>{!! $article->texte !!}</p>

@if($article->media)
    <h2>Media</h2>
    <audio controls>
        <source src="{{ $article->media }}">
        Votre navigateur ne supporte pas l’audio.
    </audio>
@endif

<h2>Caractéristiques musicales</h2>
<ul>
    <li><strong>Rythme :</strong> {{ $article->rythme->texte }}</li>
    <li><strong>Accessibilité :</strong> {{ $article->accessibilite->texte }}</li>
    <li><strong>Conclusion :</strong> {{ $article->conclusion->texte }}</li>
</ul>


<p>
    Nombre de vues : {{ $article->nb_vues }}
</p>
</x-layout.app>