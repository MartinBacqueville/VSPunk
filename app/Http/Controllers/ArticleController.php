<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Affiche un article.
     */
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
