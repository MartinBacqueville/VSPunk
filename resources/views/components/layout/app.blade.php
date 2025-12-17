<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'VsPunk' }}</title>
</head>
<body>

<x-nav />

<main>
    {{ $slot }}
</main>


<x-footer />

</body>
</html>
