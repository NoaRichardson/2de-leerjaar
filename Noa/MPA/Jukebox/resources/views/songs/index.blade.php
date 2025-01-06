@extends("layouts.master")

@section("content")
    <h1>Hier is een lijst met alle leidjes</h1>
    <ul class="container">
        @foreach($songs as $song)
            <a href="/song/view/{{$song->id}}">{{$song->name}}</a><br>
        @endforeach
    </ul>
@endsection

@push("js")

@endpush
