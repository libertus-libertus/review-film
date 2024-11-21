<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with(['user', 'film'])->get();
        return view('backend.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        return view('backend.review.create', compact('films'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'content' => 'required|string',
            'point' => 'required|integer|between:1,10',
        ], [
            'film_id.required' => 'Film wajib dipilih!',
            'content.required' => 'Konten review wajib diisi!',
            'point.required' => 'Poin review wajib diisi!',
            'point.between' => 'Poin harus antara 1 sampai 10!',
        ]);

        // Menyimpan review ke database
        Review::create([
            'user_id' => Auth::id(), // Ambil ID user dari login
            'film_id' => $request->film_id,
            'content' => $request->content,
            'point' => $request->point,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = Review::findOrFail($id);
        $films = Film::all();
        return view('backend.review.edit', compact('review', 'films'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'content' => 'required|string',
            'point' => 'required|integer|between:1,10',
        ], [
            'film_id.required' => 'Film wajib dipilih!',
            'content.required' => 'Konten review wajib diisi!',
            'point.required' => 'Poin review wajib diisi!',
            'point.between' => 'Poin harus antara 1 sampai 10!',
        ]);

        $review = Review::findOrFail($id);

        $review->update([
            'film_id' => $request->film_id,
            'content' => $request->content,
            'point' => $request->point,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('review.index')->with('success', 'Review berhasil dihapus!');
    }
}
