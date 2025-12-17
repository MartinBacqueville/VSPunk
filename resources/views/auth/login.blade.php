<x-layout.app title="Connexion">
    <form action="{{ route('login') }}" method="POST" style="max-width: 400px; margin: auto;">
        @csrf
        <div style="margin-bottom: 1rem;">
            <label for="email">Email</label><br/>
            <input type="email" id="email" name="email" required placeholder="Email" style="width: 100%; padding: 0.5rem;"/>
        </div>
        <div style="margin-bottom: 1rem;">
            <label for="password">Mot de passe</label><br/>
            <input type="password" id="password" name="password" required placeholder="Mot de passe" style="width: 100%; padding: 0.5rem;"/>
        </div>
        <div style="margin-bottom: 1rem;">
            <label>
                <input type="checkbox" name="remember"/> Remember me
            </label>
        </div>
        <div>
            <input type="submit" value="Se connecter" style="padding: 0.5rem 1rem;"/>
        </div>
    </form>
</x-layout.app>
