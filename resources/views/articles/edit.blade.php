<x-layout.app title="Éditer l'article">
    <div class="article-edit-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo">
                <img src="{{ asset('images/asset/Logo Vertical.svg') }}" alt="VS Punk" class="logo-img">
            </a>
            <x-nav></x-nav>
        </header>

        <div class="article-edit-container">
            <div class="article-edit-card">
                <h1>✏️ Éditer l'article</h1>

                @if ($errors->any())
                    <div class="form-errors">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="article-edit-form">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="en_ligne" value="0">

                    <div class="form-group">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" name="titre" id="titre" required 
                               value="{{ old('titre', $article->titre) }}" 
                               class="form-input" 
                               placeholder="Le titre de votre article punk...">
                    </div>

                    <div class="form-group">
                        <label for="resume" class="form-label">Résumé</label>
                        <textarea name="resume" id="resume" rows="3" 
                                  class="form-input" 
                                  placeholder="Un court résumé accrocheur...">{{ old('resume', $article->resume) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="texte" class="form-label">Contenu</label>
                        <textarea name="texte" id="texte" rows="8" required 
                                  class="form-input" 
                                  placeholder="Le contenu complet de votre article...">{{ old('texte', $article->texte) }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="image" class="form-label">Image (jpg / png)</label>
                            <input type="file" name="image" id="image" 
                                   accept=".jpg,.jpeg,.png" 
                                   class="form-input-file">
                            @if($article->image)
                                <p class="current-file">Image actuelle : {{ basename($article->image) }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="media" class="form-label">Lien audio (mp3)</label>
                            <input type="url" name="media" id="media" 
                                   placeholder="https://exemple.com/audio.mp3" 
                                   value="{{ old('media', $article->media) }}" 
                                   class="form-input">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="rythme_id" class="form-label">Rythme</label>
                            <select name="rythme_id" id="rythme_id" class="form-input form-select">
                                <option value="">— Choisir —</option>
                                @foreach($rythmes as $rythme)
                                    <option value="{{ $rythme->id }}" {{ $rythme->id == $article->rythme_id ? 'selected' : '' }}>
                                        {{ $rythme->texte }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="accessibilite_id" class="form-label">Accessibilité</label>
                            <select name="accessibilite_id" id="accessibilite_id" class="form-input form-select">
                                <option value="">— Choisir —</option>
                                @foreach($accessibilites as $accessibilite)
                                    <option value="{{ $accessibilite->id }}" {{ $accessibilite->id == $article->accessibilite_id ? 'selected' : '' }}>
                                        {{ $accessibilite->texte }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="conclusion_id" class="form-label">Conclusion</label>
                            <select name="conclusion_id" id="conclusion_id" class="form-input form-select">
                                <option value="">— Choisir —</option>
                                @foreach($conclusions as $conclusion)
                                    <option value="{{ $conclusion->id }}" {{ $conclusion->id == $article->conclusion_id ? 'selected' : '' }}>
                                        {{ $conclusion->texte }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">💾 Enregistrer</button>
                        <a href="{{ route('articles.show', $article) }}" class="btn-cancel">Annuler</a>
                    </div>
                </form>
            </div>
        </div>

        <x-footer />
    </div>
</x-layout.app>
