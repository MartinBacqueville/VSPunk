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
            'conclusion'
        ])->findOrFail($id);

        return view('articles.show', compact('article'));
    }
}
