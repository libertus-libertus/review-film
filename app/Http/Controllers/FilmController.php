<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class FilmController extends Controller
{
    public function index()
    {
        // Mengambil data film beserta genre
        $film = Film::with('genre')->get();
        return view('backend.film.index', compact('film'));
    }

    public function create()
    {
        $genre = DB::table('genres')->get();
        return view('backend.film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id',
        ], 
        [
            'title.required' => 'Judul wajib diisi!',
            'summary.required' => 'Summary wajib diisi!',
            'release_year.required' => 'Tahun rilis wajib diisi!',
            'poster.required' => 'Poster wajib diisi berupa gambar!', 
            'genre_id.required' => 'Genre film wajib diisi!',
        ]);

        $newImageName = time().'.'.$request->poster->extension();
        $request->poster->move(public_path('films'), $newImageName);

        $film = new Film;
        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->release_year = $request->release_year;
        $film->poster = $newImageName;
        $film->genre_id = $request->genre_id;

        $film->save();

        return redirect()->route('film.index')->with('success', 'FIlm berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::with('genre')->find($id); // Ambil satu data berdasarkan id
        return view('backend.film.detail', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genre = Genre::all();

        return view('backend.film.edit', compact('film', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) 
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id',
        ], 
        [
            'title.required' => 'Judul wajib diisi!',
            'summary.required' => 'Summary wajib diisi!',
            'release_year.required' => 'Tahun rilis wajib diisi!',
            'poster.mimes' => 'Poster harus berupa gambar dengan format png, jpg, atau jpeg!', 
            'genre_id.required' => 'Genre film wajib diisi!',
        ]);

        // Cari film berdasarkan ID
        $film = Film::findOrFail($id);

        // Cek apakah poster diperbarui
        if ($request->hasFile('poster')) {
            // Hapus poster lama
            if (File::exists(public_path('films/' . $film->poster))) {
                File::delete(public_path('films/' . $film->poster));
            }

            // Upload poster baru
            $newImageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('films'), $newImageName);

            // Update data film termasuk poster baru
            $film->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'release_year' => $request->release_year,
                'poster' => $newImageName,
                'genre_id' => $request->genre_id,
            ]);
        } else {
            // Update data film tanpa mengubah poster
            $film->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'release_year' => $request->release_year,
                'genre_id' => $request->genre_id,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari film berdasarkan ID
        $film = Film::findOrFail($id);

        // Hapus file gambar jika ada
        if (File::exists(public_path('films/' . $film->poster))) {
            File::delete(public_path('films/' . $film->poster));
        }

        // Hapus data film dari database
        $film->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus!');
    }
}