<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="VS Punk - Plateforme de publication musicale punk">
    <title>{{ $title ?? 'VS Punk' }}</title>
    @vite(['resources/css/vspunk.css'])
</head>
<body>

{{ $slot }}

</body>
</html>
