<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'image' => basename($imagePath),
            'category' => $request->category,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category' => 'required|string|max:255',
        ]);

        $data = ['category' => $request->category];

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists('galleries/' . $gallery->image)) {
                Storage::disk('public')->delete('galleries/' . $gallery->image);
            }
            $imagePath = $request->file('image')->store('galleries', 'public');
            $data['image'] = basename($imagePath);
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists('galleries/' . $gallery->image)) {
            Storage::disk('public')->delete('galleries/' . $gallery->image);
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
