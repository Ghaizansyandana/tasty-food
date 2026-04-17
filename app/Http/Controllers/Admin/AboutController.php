<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $contents = AboutContent::latest()->get();
        return view('admin.about.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $imagePath = $request->file('image')->store('about', 'public');

        AboutContent::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit(AboutContent $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, AboutContent $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($about->image);
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy(AboutContent $about)
    {
        Storage::disk('public')->delete($about->image);
        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'Konten berhasil dihapus.');
    }
}
