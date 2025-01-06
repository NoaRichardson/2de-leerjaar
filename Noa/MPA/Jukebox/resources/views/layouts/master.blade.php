<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/master.css">
    @stack("styles")
</head>
<body>
{{--   navigatiemenu--}}
<nav class="container">
    <ul class="menu">
        <a href="/login">Inloggen</a>
        <a href="/register">Registeren</a>
        <a href="/genres">Genres</a>
        <a href="/songs">Songs</a>
        <a href="/playlists">Playlists</a>
    </ul>
</nav>

{{--Content--}}
@yield("content")

{{-- Footer --}} 
<footer>Jukebox 2024</footer>

{{--Js--}}
@stack("js")
</body>
</html>