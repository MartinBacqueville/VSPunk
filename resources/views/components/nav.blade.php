<nav>
    <a href="{{ route('accueil') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Accueil">
    </a>
    <a href="{{route('test-vite')}}">Créer un article</a>

    @auth
        {{Auth::user()->name}}
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}">Login</a>
        <a href="{{route("register")}}">Register</a>
    @endauth
</nav>
