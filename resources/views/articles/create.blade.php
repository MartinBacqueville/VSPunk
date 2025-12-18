<x-layout.app title="Créer un article">
    <div class="user-profile-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo Vertical.svg') }}" alt="VS Punk" class="logo-img"></a>
            <div class="nav-buttons">
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-outline">Déconnexion</button>
                    </form>
                    <div class="avatar"></div>
                @else
                    <a href="{{ route('login') }}" class="btn-outline">Connexion</a>
                @endauth
            </div>
        </header>

        <div class="user-profile-container" style="max-width: 800px;">
            <div class="user-profile-card">
                <div class="user-profile-header">
                    <div class="user-info" style="text-align: center; width: 100%;">
                        <h1>🎸 Créer un nouvel article</h1>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="user-section" style="background: #fca5a5; border-bottom: 3px solid #ef4444;">
                        <ul style="color: #991b1b; margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="en_ligne" value="0">

                    <div class="user-section">
                        <h2>Informations de l'article</h2>

                        <div class="form-group">
                            <label for="titre" class="form-label">Titre *</label>
                            <input type="text" name="titre" id="titre" required value="{{ old('titre') }}"
                                class="form-input" placeholder="Le titre de votre article...">
                        </div>

                        <div class="form-group">
                            <label for="resume" class="form-label">Résumé</label>
                            <textarea name="resume" id="resume" rows="3" class="form-input"
                                placeholder="Un court résumé de votre article...">{{ old('resume') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="texte" class="form-label">Contenu *</label>
                            <textarea name="texte" id="texte" rows="8" required class="form-input"
                                placeholder="Le contenu complet de votre article...">{{ old('texte') }}</textarea>
                        </div>
                    </div>

                    <div class="user-section">
                        <h2>Média</h2>

                        <div class="form-group">
                            <label for="image" class="form-label">Image (jpg / png)</label>
                            <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" class="form-input-file">
                        </div>

                        <div class="form-group">
                            <label for="media" class="form-label">Lien audio (mp3)</label>
                            <input type="url" name="media" id="media" placeholder="https://exemple.com/audio.mp3"
                                value="{{ old('media') }}" class="form-input">
                        </div>
                    </div>

                    <div class="user-section">
                        <h2>Catégories</h2>

                        <div class="form-group">
                            <label for="rythme_id" class="form-label">Rythme</label>
                            <select name="rythme_id" id="rythme_id" class="form-input form-select">
                                <option value="">— Choisir —</option>
                                @foreach($rythmes as $rythme)
                                    <option value="{{ $rythme->id }}" {{ old('rythme_id') == $rythme->id ? 'selected' : '' }}>
                                        {{ $rythme->texte }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="accessibilite_id" class="form-label">Accessibilité</label>
                            <select name="accessibilite_id" id="accessibilite_id" class="form-input form-select">
                                <option value="">— Choisir —</option>
                                @foreach($accessibilites as $accessibilite)
                                    <option value="{{ $accessibilite->id }}" {{ old('accessibilite_id') == $accessibilite->id ? 'selected' : '' }}>{{ $accessibilite->texte }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="conclusion_id" class="form-label">Conclusion</label>
                            <select name="conclusion_id" id="conclusion_id" class="form-input form-select">
                                <option value="">— Choisir —</option>
                                @foreach($conclusions as $conclusion)
                                    <option value="{{ $conclusion->id }}" {{ old('conclusion_id') == $conclusion->id ? 'selected' : '' }}>{{ $conclusion->texte }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="follow-button-container" style="gap: 15px;">
                        <button type="submit" class="btn-follow">🎸 Enregistrer</button>
                        <a href="{{ route('articles.index') }}" class="btn-follow btn-unfollow">Annuler</a>
                    </div>
                </form>
            </div>
        </div>

        <footer class="articles-footer">
            <h3>VS Punk</h3>
            <p>Plateforme de publication musicale réalisée dans le cadre du Marathon du Web – IUT de Lens. Projet
                pédagogique mêlant création de contenu, design et développement web.</p>
            <p class="copyright">© 2025 – Équipe 2 VS Punk • Tous droits réservés</p>
        </footer>
    </div>
</x-layout.app>