@extends("layouts.master")

@section("content")
<div class="info_block">
    <h1>{{$genre->name}}</h1>
    <p>Er zijn {{$genre->songs->count()}} liedjes met deze genre</p>
    @foreach ($genre->songs as $song)
        <p>{{$song->name}}</p>
    @endforeach
</div>
@endsection