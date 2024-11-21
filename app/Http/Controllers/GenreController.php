<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre = DB::table('genres')->get();
        return view('backend.genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|string|max:255'], 
            ['name.required' => 'Nama wajib diisi!']);

        Genre::create(["name" => $request->name]);

        return redirect()->route('genre.index')->with('success', 'Genre berhasil disimpan!');
    }
    
    public function edit(string $id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('backend.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['name' => 'required|string|max:255'], 
            ['name.required' => 'Nama wajib diisi!']
        );

        $cast = Genre::findOrFail($id);
        $cast->update(["name" => $request->name]);

        return redirect()->route('genre.index')->with('success', 'Cast berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus!');
    }
}
