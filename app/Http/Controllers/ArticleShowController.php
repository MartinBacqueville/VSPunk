<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleShowController extends Controller
{
    public function show(int $id)
    {

        $article = Article::with([
            'editeur',
            'rythme',
            'accessibilite',
            'conclusion',
            'avis.user',
            'likes'
        ])->findOrFail($id);


        $article->increment('nb_vues');

        return view('articles.show', compact('article'));
    }
}
