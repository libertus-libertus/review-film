<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function index()
    {
        $cast = DB::table('casts')->get();
        return view('backend.cast.index', compact('cast'));
    }

    public function create()
    {
        return view('backend.cast.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'bio' => 'required|string'
        ],
        [
            'name.required' => 'Nama wajib diisi!',
            'age.required' => 'Umur wajib diisi!',
            'age.integer' => 'Umur harus berupa angka!',
            'bio.required' => 'Bio wajib diisi!',
        ]);

        Cast::create([
            "name" => $request->name,
            "age" => $request->age,
            "bio" => $request->bio,
        ]);

        return redirect()->route('cast.index')->with('success', 'Cast berhasil disimpan!');
    }

    public function show(string $id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('backend.cast.detail', compact('cast'));
    }

    public function edit(string $id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('backend.cast.edit', compact('cast'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'bio' => 'required|string'
        ],
        [
            'name.required' => 'Nama wajib diisi!',
            'age.required' => 'Umur wajib diisi!',
            'age.integer' => 'Umur harus berupa angka!',
            'bio.required' => 'Bio wajib diisi!',
        ]);

        $cast = Cast::findOrFail($id);

        $cast->update([
            "name" => $request->name,
            "age" => $request->age,
            "bio" => $request->bio,
        ]);

        return redirect()->route('cast.index')->with('success', 'Cast berhasil diperbaharui!');
    }

    public function destroy(string $id)
    {
        $cast = Cast::findOrFail($id);
        $cast->delete();

        return redirect()->route('cast.index')->with('success', 'Cast berhasil dihapus!');
    }
}
