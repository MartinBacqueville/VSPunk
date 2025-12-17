<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'contenu' => 'required|string|min:3',
        ]);

        $article->avis()->create([
            'contenu' => $request->contenu,
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
