<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = auth()->id();
        $playlists = Playlist::where("user_id", $userId)->get();
        return view("playlists.index", ["playlists"=>$playlists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("playlists.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validated = $request->validate([
                "playlistName" => "required|string",
                "playlistDescription" => "required|string",
            ]);
            
            $userId = auth()->id();
            Playlist::create([
                "name" => $request->playlistName,
                "description" => $request->playlistDescription,
                "user_id" => $userId,
            ]);

            return redirect()->back()->with('success', 'Playlist created!');
        } else {
            // Go to function storeTemporaryplaylist
            return $this->storeTemporaryPlaylist($request);
        }
    }

    public function storeTemporaryPlaylist(Request $request)
    {
        $validated = $request->validate([
            "playlistName" => "required|string",
            "playlistDescription" => "required|string",
        ]);

        $temporaryPlaylists = session()->get('temporary_playlists', []);
        $temporaryPlaylists[] = [
            'name' => $validated['playlistName'],
            'description' => $validated['playlistDescription'],
            'songs' => [],
        ];
        session()->put('temporary_playlists', $temporaryPlaylists);

        return redirect()->back()->with('success', 'Temporary playlist created!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(playlist $playlist)
    {
        $playlistDuration = 0;
        foreach($playlist->songs as $song)
        {
            $playlistDuration += $song->duration;
        }
        $songs = Song::all();
        $playlistSongs = $playlist->songs;
        return view("playlists.show", ["playlist" => $playlist, "songs" => $songs, "playlistDuration" => $playlistDuration, "playlistSongs" => $playlistSongs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playlist $playlist)
    {
        return view("playlists.edit", ["playlist" => $playlist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, playlist $playlist)
    {
        $validated = $request->validate([
            "playlistName" => "required|string",
            "playlistDescription" => "required|string",
        ]);

        $playlist->update([
            "name" => $request->playlistName,
            "description" => $request->playlistDescription,
        ]);

        return redirect()->back()->with('success', 'Playlist updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, playlist $playlist)
    {
        $song = $request->selectedSong;
        $playlist->songs()->detach($song);
        return redirect()->back();
    }

    public function addSongToPlaylist(Request $request, playlist $playlist){
        if (Auth::check())
        {
            $song = $request->selectedSong;
            $playlist->songs()->attach($song);
            return redirect()->back();
        } else {
            return $this->addSongToTemporaryPlaylist($request, $playlist);
        }
    }

    public function addSongToTemporaryPlaylist(Request $request, playlist $playlist)
    {
        $songId = $request->selectedSong;
        $temporaryPlaylists = session()->get('temporary_playlists');

        foreach ($temporaryPlaylists as &$tempPlaylist) {
            if ($tempPlaylist['name'] == $playlist->name) {
                $tempPlaylist['songs'][] = $songId;
                session()->put('temporary_playlists', $temporaryPlaylists);
            }
        }

        return redirect()->back()->with('success', 'Song added to temporary playlist!');

    }
}
