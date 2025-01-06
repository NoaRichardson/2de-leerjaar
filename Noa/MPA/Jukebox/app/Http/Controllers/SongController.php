<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //view
        $songs = Song::all();
        return view("songs.index", ["songs"=>$songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("songs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "songName" => "required|string",
            "songDuration" => "required|integer|min:0",
            "songGenreId" => "required|integer|min:1|exists:genres,id",
            "songArtist" => "required|string|min:1"
        ]);
        Song::create([
            "name" => $request->songName,
            "duration" => $request->songDuration,
            "genre_id" => $request->songGenreId,
            "artist" => $request->songArtist
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        $playlists = Playlist::all();
        return view("songs.detail", ["playlists" => $playlists, "song" => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }

    public function addSongToPlaylist(Request $request, Song $song){
        if (Auth::check())
        {
            $playlist = $request->selectedPlaylist;
            $song->playlists()->attach($playlist);
            return redirect()->back();
        } else {
            return $this->addSongToTemporaryPlaylist($request, $song);
        }
    }

    public function addSongToTemporaryPlaylist(Request $request, Song $song)
    {
        $songId = $song->id;
        $temporaryPlaylists = session()->get('temporary_playlists');
        $playlistName = $request->selectedPlaylist;

        foreach ($temporaryPlaylists as &$tempPlaylist) {
            if ($tempPlaylist['name'] == $playlistName) {
                $tempPlaylist['songs'][] = $songId;
                session()->put('temporary_playlists', $temporaryPlaylists);
            }
        }
        return redirect()->back()->with('success', 'Song added to temporary playlist!');
    }
}
