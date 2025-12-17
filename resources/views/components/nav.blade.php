<nav class="top-buttons">
    @auth
        <a href="{{ route('articles.create') }}" class="btn btn-black" id="btn-creer">Ajouter un article</a>

        <a href="{{ route('logout') }}" class="btn btn-black" id="btn-connecter"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Se déconnecter
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-black" id="btn-connecter">Se connecter</a>
        <a href="{{ route('register') }}" class="btn btn-black" id="btn-register">S'inscrire</a>
    @endauth
</nav>