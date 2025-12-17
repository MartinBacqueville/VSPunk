@props(['user'])

@auth
    @if(auth()->id() !== $user->id)
        <form method="POST" action="{{ route('user.follow', $user->id) }}">
            @csrf
            @if(auth()->user()->suivis->contains($user->id))
                <button type="submit">Ne plus suivre</button>
            @else
                <button type="submit">Suivre</button>
            @endif
        </form>
    @endif
@endauth
