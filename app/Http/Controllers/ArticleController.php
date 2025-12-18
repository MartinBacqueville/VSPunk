<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Rythme;
use App\Models\Accessibilite;
use App\Models\Conclusion;
use Illuminate\Http\Request;
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


    public function create()
    {
        return view('articles.create', [
            'rythmes' => Rythme::all(),
            'accessibilites' => Accessibilite::all(),
            'conclusions' => Conclusion::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'texte' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'media' => 'nullable|string',
            'rythme_id' => 'nullable|exists:rythmes,id',
            'accessibilite_id' => 'nullable|exists:accessibilites,id',
            'conclusion_id' => 'nullable|exists:conclusions,id',
            'en_ligne' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img_articles', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['user_id'] = auth()->id();
        $validated['en_ligne'] = 0;
        $validated['nb_vues'] = 0;


        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article créé avec succès');
    }
    public function publish(Article $article)
    {
        if(auth()->id() !== $article->user_id) {
            abort(403);
        }

        $article->en_ligne = 1;
        $article->save();

        return redirect()->route('articles.show', $article->id)
            ->with('success', 'Article publié !');
    }
    public function edit(Article $article) {
        if(auth()->id() !== $article->user_id) {
            abort(403);
        }
        return view('articles.edit', [
            'rythmes' => Rythme::all(),
            'accessibilites' => Accessibilite::all(),
            'conclusions' => Conclusion::all(),'article' => $article]);
    }

    public function update(Request $request, Article $article) {

        $article->update([
            'titre' => $request->titre,
            'resume' => $request->resume,
            'texte' => $request->texte,
            'image' => $request->image,
            'media' => $request->media,
            'rythme_id' => $request->rythme_id,
            'accessibilite_id' => $request->accessibilite_id,
            'conclusion_id' => $request->conclusion_id,
        ]);

        return redirect()->route('articles.show', $article);
    }
}