<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with([
            'editeur',
            'rythme',
            'accessibilite'
        ])
            ->where('en_ligne', 1)
            ->orderByDesc('created_at')
            ->limit(2)
            ->get();

        return view('pages.home', compact('articles'));
    }

}
