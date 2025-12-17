<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleShowController extends Controller
{
    public function show(Article $article)
    {
        $article->load([
            'editeur',
            'rythme',
            'accessibilite',
            'conclusion'
        ]);

        $article->increment('nb_vues');

        return view('articles.show', compact('article'));
    }
}
