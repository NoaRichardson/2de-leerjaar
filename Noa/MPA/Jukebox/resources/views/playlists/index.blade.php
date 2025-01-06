@extends("layouts.master")

@section("content")
    <h1>Hier zie je jouw playlists</h1>
    <ul class="container">
        @if(Auth::check())
            @foreach($playlists as $playlist)
                <li>
                    <a href="/playlist/view/{{$playlist->id}}">{{$playlist->name}}</a>
                </li> 
            @endforeach
        @else
            @if(session('temporary_playlists'))
                @foreach(session('temporary_playlists') as $temporaryPlaylist)
                    <li>
                        <span>{{$temporaryPlaylist['name']}}</span> (Temporary)
                    </li>
                @endforeach
            @endif
        @endif
    </ul>
@endsection
