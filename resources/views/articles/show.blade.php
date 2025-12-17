@extends('layout.app')

@section('content')

    <h1>{{ $article->titre }}</h1>

    <p>
        Écrit par <strong>{{ $article->editeur->name }}</strong>
    </p>

    <img src="{{ $article->image }}" alt="Image de l'article">

    <h2>Résumé</h2>
    <p>{{ $article->resume }}</p>

    <h2>Article</h2>
    <p>{!! $article->texte !!}</p>

    <h2>Media</h2>
    <audio controls>
        <source src="{{ $article->media }}">
        Votre navigateur ne supporte pas l’audio.
    </audio>

    <h2>Caractéristiques musicales</h2>
    <ul>
        <li>
            <strong>Rythme :</strong> {{ $article->rythme->libelle }}
        </li>
        <li>
            <strong>Accessibilité :</strong> {{ $article->accessibilite->libelle }}
        </li>
        <li>
            <strong>Conclusion :</strong> {{ $article->conclusion->libelle }}
        </li>
    </ul>

    <p>
        Nombre de vues : {{ $article->nb_vues }}
    </p>

@endsection
