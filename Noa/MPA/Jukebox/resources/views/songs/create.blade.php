@extends("layouts.master")
@section("content")
<form action="/song/store" method="POST">
    @csrf
    <label for="name">Vul hier de song naam in:</label>
    <input type="text" name="songName"><br>
    @error("songName")
    {{$message}}
    @enderror

    <label for="duration">Vul hier de duratie in seconden in:</label>
    <input type="int" name="songDuration"><br>
    @error("songDuration")
    {{$message}}
    @enderror

    <label for="genre_id">Vul hier de genre_id in:</label>
    <input type="number" name="songGenreId"><br>
    @error("songGenreId")
    {{$message}}
    @enderror

    <label for="artist">Vul hier de artist in:</label>
    <input type="text" name="songArtist"><br>
    @error("songArtist")
    {{$message}}
    @enderror

    <input type="submit">
</form>
@endsection