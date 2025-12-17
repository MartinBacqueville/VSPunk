<x-layout.app>
    <div>

        <div>

            <div>
                <h1>
                    Modifier le profil
                </h1>
            </div>

            @if(session('profile_success'))
                <div>
                    {{ session('profile_success') }}
                </div>
            @endif
            @if(session('password_success'))
                <div>
                    {{ session('password_success') }}
                </div>
            @endif

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label>Avatar actuel</label>
            <div>
                <img  src="{{ $user->avatar ?? '/images/default-avatar.jpg' }}" alt="Avatar actuel">
            </div>
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="avatar">Nouvel Avatar</label>
                <div>
                    <img id="avatar-preview" src="{{ $user->avatar ?? '/images/default-avatar.jpg' }}" alt="Avatar actuel">
                </div>

                <input type="file" id="avatar" name="avatar" accept="image/*" onchange="previewAvatar(event)">

                <div>
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <button type="submit">
                    Mettre à jour le profil
                </button>
            </form>

            <form action="{{ route('profile.password.update') }}" method="POST" class="grid gap-y-4 mt-6">
                @csrf

                <div>
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>

                <div>
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" >
                    Modifier le mot de passe
                </button>
            </form>

        </div>
        <a href="{{ route('home') }}" >⬅ Retour à l’accueil</a>
        <a href="{{ route('profile.show') }}" >⬅ Retour au profil</a>
    </div>


    <script>
        function previewAvatar(event) {
            const input = event.target;
            const preview = document.getElementById('avatar-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layout.app>
