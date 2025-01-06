@extends("layouts.master")

@section("content")
    <h1>Hier is een lijst met de genres</h1>
    <ul class="container">
        @foreach($genres as $genre)
            <a href="/genre/view/{{$genre->id}}">{{$genre->name}}</a><br>
        @endforeach
    </ul>
@endsection