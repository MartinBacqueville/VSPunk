<x-layout.app title="Modifier le profil">
    <div class="user-profile-page">
        <header class="articles-header">
            <a href="{{ route('accueil') }}" class="logo"><img src="{{ asset('images/asset/Logo_Vertical.svg') }}" alt="VS Punk" class="logo-img"></a>
            <div class="nav-buttons">
                @auth
                    <a href="{{ route('articles.create') }}" class="btn-outline">ajouter un article</a>
                    <a href="{{ route('profile.show', auth()->id()) }}" class="btn-outline">{{ auth()->user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-outline">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-outline">Connexion</a>
                @endauth
            </div>
        </header>

        <div class="user-profile-container">
            <div class="user-profile-card">
                <div class="user-profile-header">
                    <div class="user-avatar">
                        <img id="avatar-preview" src="{{ $user->avatar ?? '/images/default-avatar.jpg' }}"
                            alt="Avatar actuel">
                    </div>
                    <div class="user-info">
                        <h1>Modifier le profil ✏️</h1>
                    </div>
                </div>

                @if(session('profile_success'))
                    <div class="user-section" style="background: #4ade80; border-bottom: 3px solid #22c55e;">
                        <p style="color: #166534; font-weight: bold; margin: 0;">{{ session('profile_success') }}</p>
                    </div>
                @endif
                @if(session('password_success'))
                    <div class="user-section" style="background: #4ade80; border-bottom: 3px solid #22c55e;">
                        <p style="color: #166534; font-weight: bold; margin: 0;">{{ session('password_success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="user-section" style="background: #fca5a5; border-bottom: 3px solid #ef4444;">
                        <ul style="color: #991b1b; margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="user-section">
                        <h2>Informations du profil</h2>

                        <div class="form-group">
                            <label for="avatar" class="form-label">Nouvel Avatar</label>
                            <input type="file" id="avatar" name="avatar" accept="image/*"
                                onchange="previewAvatar(event)" class="form-input-file">
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                class="form-input">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                required class="form-input">
                        </div>

                        <button type="submit" class="btn-follow" style="margin-top: 15px;">
                            Mettre à jour le profil
                        </button>
                    </div>
                </form>

                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf

                    <div class="user-section">
                        <h2>Changer le mot de passe</h2>

                        <div class="form-group">
                            <label for="current_password" class="form-label">Mot de passe actuel</label>
                            <input type="password" id="current_password" name="current_password" required
                                class="form-input">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" id="password" name="password" required class="form-input">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="form-input">
                        </div>

                        <button type="submit" class="btn-follow" style="margin-top: 15px;">
                            Modifier le mot de passe
                        </button>
                    </div>
                </form>

                <div class="follow-button-container" style="gap: 15px;">
                    <a href="{{ route('home') }}" class="btn-follow">⬅ Retour à l'accueil</a>
                    <a href="{{ route('profile.show') }}" class="btn-follow btn-unfollow">👤 Mon profil</a>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>

    <script>
        function previewAvatar(event) {
            const input = event.target;
            const preview = document.getElementById('avatar-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layout.app>