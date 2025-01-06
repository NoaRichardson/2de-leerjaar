<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Playlist;

class HandleUserLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        $user = $event->user;
        $temporaryPlaylists = session()->get('temporary_playlists', []);

        if (!empty($temporaryPlaylists)) {
            foreach ($temporaryPlaylists as $tempPlaylist) {
                $playlist = Playlist::create([
                    'name' => $tempPlaylist['name'],
                    'description' => $tempPlaylist['description'],
                    'user_id' => $user->id,
                ]);

                if (!empty($tempPlaylist['songs'])) {
                    $songs = $tempPlaylist['songs'];
                    foreach ($songs as $song) {
                        $playlist->songs()->attach($song);
                    }
                }
            }

            session()->forget('temporary_playlists');
        }
    }

}