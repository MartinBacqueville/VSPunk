<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleLikeController extends Controller
{
    public function toggle(Request $request, Article $article)
    {
        $request->validate([
            'nature' => 'required|in:like,dislike',
        ]);

        $user = auth()->user();

        $existing = $article->likes()
            ->where('user_id', $user->id)
            ->first();

        // Cas 1 : même réaction → on retire
        if ($existing && $existing->pivot->nature === $request->nature) {
            $article->likes()->detach($user->id);
        }
        // Cas 2 : autre réaction → on met à jour
        elseif ($existing) {
            $article->likes()->updateExistingPivot($user->id, [
                'nature' => $request->nature
            ]);
        }
        // Cas 3 : aucune réaction → on ajoute
        else {
            $article->likes()->attach($user->id, [
                'nature' => $request->nature
            ]);
        }

        return back();
    }
}
