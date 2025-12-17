<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $searchT = trim($request->input('searchT', ''));
        $searchA = trim($request->input('searchA', ''));
        $searchR = trim($request->input('searchR', ''));
        $searchAccess = trim($request->input('searchAccess', ''));
        Cookie::queue('search', $searchT, 10);

        $articles = Article::with(['editeur', 'rythme', 'accessibilite'])
            ->when($searchT !== '', fn ($q) =>
            $q->where('titre', 'like', "%$searchT%")
            )
            ->when($searchA !== '', fn ($q) =>
            $q->whereHas('editeur', fn ($q2) =>
            $q2->where('name', 'like', "%$searchA%")
            )
            )
            ->when($searchR !== '', fn ($q) =>
            $q->whereHas('rythme', fn ($q2) =>
            $q2->where('texte', 'like', "%$searchR%")
            )
            )
            ->when($searchAccess !== '', fn ($q) =>
            $q->whereHas('accessibilite', fn ($q2) =>
            $q2->where('texte', 'like', "%$searchAccess%")
            )
            )
            ->where('en_ligne', 1)
            ->get();

        $titres = Article::select('titre')->distinct()->get();

        return view('articles.index', [
            'titre' => "Liste des articles",
            'searchT' => $searchT,
            'searchA' => $searchA,
            'searchR' => $searchR,
            'searchAccess' => $searchAccess,
            'titres' => $titres,
            'articles' => $articles
        ]);
    }
}