@props(['article'])

<article class="punk-card" style="
    position: relative;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.08);
    background: #f5e6d3;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
">
    <span style="
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ffbe0b;
        color: #000;
        padding: 5px 15px;
        font-weight: bold;
        text-transform: uppercase;
        z-index: 10;
        transform: rotate(3deg);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        border: 2px solid #000;
        font-size: 12px;
    ">tire</span>

    <div style="position: relative; width: 100%; height: 180px; overflow: hidden;">
        @if($article->image)
            <img
                    src="{{ asset($article->image) }}"
                    alt="{{ $article->titre }}"
                    style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                "
            >
        @endif

        <div style="
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        ">
            <h2 style="
                margin: 0;
                text-align: center;
            ">
                <a href="{{ route('articles.show', $article) }}" style="
                    color: white;
                    text-decoration: none;
                    font-size: 24px;
                    font-weight: bold;
                    text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
                    display: block;
                    transition: color 0.2s ease;
                " onmouseover="this.style.color='#ffbe0b'" onmouseout="this.style.color='white'">
                    {{ $article->titre }}
                </a>
            </h2>
        </div>
    </div>

    <div style="padding: 15px; background: #f5e6d3;">
        <p style="margin: 10px 0; color: #666; font-size: 14px;">
            Par
            <a href="{{ route('user.show', $article->editeur->id) }}" style="
                color: #5b21b6;
                text-decoration: none;
                font-weight: 500;
            ">
                {{ $article->editeur->name }}
            </a>
        </p>

        <ul style="
            list-style: none;
            padding: 0;
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        ">
            <li style="margin: 5px 0;">
                <strong>Rythme :</strong>
                @if($article->rythme)
                    <a href="{{ route('articles.index', ['searchR' => $article->rythme->texte]) }}" style="
                        color: #3b82f6;
                        text-decoration: none;
                    ">
                        {{ $article->rythme->texte }}
                    </a>
                @else
                    Non défini
                @endif
            </li>

            <li style="margin: 5px 0;">
                <strong>Accessibilité :</strong>
                @if($article->accessibilite)
                    <a href="{{ route('articles.index', ['searchAccess' => $article->accessibilite->texte]) }}" style="
                        color: #3b82f6;
                        text-decoration: none;
                    ">
                        {{ $article->accessibilite->texte }}
                    </a>
                @else
                    Non définie
                @endif
            </li>
        </ul>

        <p style="
            margin: 10px 0 0 0;
            color: #888;
            font-size: 13px;
            line-height: 1.4;
        ">
            {{ Str::limit($article->texte, 120) }}
        </p>
    </div>
</article>

<style>
    .punk-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        cursor: pointer;
    }
</style>