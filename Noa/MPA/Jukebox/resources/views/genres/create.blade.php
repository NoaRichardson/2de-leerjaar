@extends("layouts.master")

@section("content")
    <form action="/genre/store" method="POST">
        @csrf
        <label for="name">Vul hier de genrenaam in:</label>
        <input type="text" name="genreName">
        @error("genreName")
        <p>{{$message}}</p>
        @enderror
        <input type="submit">
    </form>
@endsection