<x-layout.app title="Créer un article">
    <div class="articles-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo">Logo</a>
            <x-nav></x-nav>
        </header>

        <main class="main-content" style="padding:40px; max-width:900px; margin:auto;">

            <h1>Créer un nouvel article</h1>

            @if ($errors->any())
                <div style="color:red; margin-bottom:20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                    action="{{ route('articles.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="en_ligne" value="0">

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" required value="{{ old('titre') }}">
                </div>

                <div class="form-group">
                    <label for="resume">Résumé</label>
                    <textarea name="resume" id="resume" rows="3">{{ old('resume') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="texte">Contenu</label>
                    <textarea name="texte" id="texte" rows="6" required>{{ old('texte') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image (jpg / png)</label>
                    <input
                            type="file"
                            name="image"
                            id="image"
                            accept=".jpg,.jpeg,.png"
                    >
                </div>

                <div class="form-group">
                    <label for="media">Lien audio (mp3)</label>
                    <input
                            type="url"
                            name="media"
                            id="media"
                            placeholder="https://exemple.com/audio.mp3"
                            value="{{ old('media') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="rythme_id">Rythme</label>
                    <select name="rythme_id" id="rythme_id">
                        <option value="">— Choisir —</option>
                        @foreach($rythmes as $rythme)
                            <option value="{{ $rythme->id }}">{{ $rythme->texte }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="accessibilite_id">Accessibilité</label>
                    <select name="accessibilite_id" id="accessibilite_id">
                        <option value="">— Choisir —</option>
                        @foreach($accessibilites as $accessibilite)
                            <option value="{{ $accessibilite->id }}">{{ $accessibilite->texte }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="conclusion_id">Conclusion</label>
                    <select name="conclusion_id" id="conclusion_id">
                        <option value="">— Choisir —</option>
                        @foreach($conclusions as $conclusion)
                            <option value="{{ $conclusion->id }}">{{ $conclusion->texte }}</option>
                        @endforeach
                    </select>
                </div>

                <button>Enregistrer</button>
                <a href="{{ route('articles.index') }}">Annuler</a>

            </form>
        </main>

        <x-footer />
    </div>
</x-layout.app>
