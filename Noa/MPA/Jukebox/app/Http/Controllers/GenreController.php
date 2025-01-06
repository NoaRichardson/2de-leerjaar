<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view("genres.index", ["genres"=>$genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("genres.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "genreName" => "unique:genres,name|required|min:2"
        ]);
        //gebruik model om data in database te zetten
        Genre::create(["name" => $request->genreName]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view("genres.detail", ["genre" => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
