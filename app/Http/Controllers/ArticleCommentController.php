<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Avis;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'contenu' => 'required|string|min:3',
        ]);

        $userId = auth()->id();

        $dejaCommente = $article->avis()
            ->where('user_id', $userId)
            ->exists();

        if ($dejaCommente) {
            return back()->withErrors([
                'contenu' => 'Vous avez déjà commenté cet article.'
            ]);
        }

        $article->avis()->create([
            'contenu' => $request->contenu,
            'user_id' => $userId,
        ]);

        return back();
    }
        public function destroy(Avis $avis)
    {
        if ($avis->user_id !== auth()->id()) {
            abort(403);
        }

        $avis->delete();

        return back();
    }

}
