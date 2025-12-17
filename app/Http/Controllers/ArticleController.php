<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with([
            'editeur',
            'rythme',
            'accessibilite'
        ])
            ->where('en_ligne', 1)
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }
}
