@extends("layouts.master")

@section("content")
<form action="/playlist/update/{{$playlist->id}}" method="POST">
    @csrf
    <label for="name">Vul hier de playlist naam in:</label>
    <input type="text" name="playlistName">
    @error("playlistName")
    <p>{{$message}}</p>
    @enderror
    <label for="description">Vul een description in:</label>
    <input type="text" name="playlistDescription">
    @error("playlistDescription")
    <p>{{$message}}</p>
    @enderror
    <input type="submit">
</form>
@endsection