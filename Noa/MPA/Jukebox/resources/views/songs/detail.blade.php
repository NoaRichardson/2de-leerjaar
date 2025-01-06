@extends("layouts.master")

@section("content")
    <div class="info_block">
        <h1>Name: {{$song->name}}</h1>
        <p>Duration: {{$song->duration}}</p>
        <p>Artist: {{$song->artist}}</p>

        @if(Auth::check())
            <form action="/song/addplaylist/{{$song->id}}" method="POST">
                @csrf
                <select name="selectedPlaylist">
                    @foreach($playlists as $playlist)
                        <option value="{{$playlist->id}}">{{$playlist->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Add to playlist">
            </form>
        @else
            @if(session('temporary_playlists'))
                <form action="/song/addplaylist/{{$song->id}}" method="POST">
                    @csrf
                    <select name="selectedPlaylist">
                        @foreach(session('temporary_playlists') as $temporaryPlaylist)
                            <option value="{{$temporaryPlaylist['name']}}">{{$temporaryPlaylist['name']}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Add to temporary playlist">
                </form>
            @endif
        @endif
    </div>
@endsection
