<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/hello", [Welcome::class, "hello"]);

Route::get("/songs", [SongController::class, "index"]);
Route::get("/song/create", [SongController::class, "create"]);
Route::post("/song/store", [SongController::class, "store"]);
Route::get("/song/view/{song}", [SongController::class, "show"]);
Route::post("/song/addplaylist/{song}", [SongController::class, "addSongToPlaylist"]);

Route::get("/genres", [GenreController::class, "index"]);
Route::get("/genre/create", [GenreController::class, "create"]);
Route::get("/genre/view/{genre}", [GenreController::class, "show"]);
Route::post("/genre/store", [GenreController::class, "store"])->name("genre.store");

Route::get("/playlists", [PlaylistController::class, "index"]);
Route::get("/playlist/create", [PlaylistController::class, "create"]);
Route::post("/playlist/store", [PlaylistController::class, "store"]);
Route::get("/playlist/view/{playlist}", [PlaylistController::class, "show"]);
Route::post("/playlist/addsong/{playlist}", [PlaylistController::class, "addSongToPlaylist"]);
Route::get("/playlist/edit/{playlist}", [PlaylistController::class, "edit"]);
Route::post("/playlist/update/{playlist}", [PlaylistController::class, "update"]);
Route::post("/playlist/delete/{playlist}", [PlaylistController::class, "delete"]);

require __DIR__.'/auth.php';
