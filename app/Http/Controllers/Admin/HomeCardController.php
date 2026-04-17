<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeCardController extends Controller
{
    public function index()
    {
        $cards = HomeCard::all();
        return view('admin.home_cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.home_cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $imagePath = $request->file('image')->store('home_cards', 'public');

        HomeCard::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.home_cards.index')->with('success', 'Card berhasil ditambahkan.');
    }

    public function edit(HomeCard $home_card)
    {
        return view('admin.home_cards.edit', compact('home_card'));
    }

    public function update(Request $request, HomeCard $home_card)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            if (!str_contains($home_card->image, 'images/')) {
                Storage::disk('public')->delete($home_card->image);
            }
            $data['image'] = $request->file('image')->store('home_cards', 'public');
        }

        $home_card->update($data);

        return redirect()->route('admin.home_cards.index')->with('success', 'Card berhasil diperbarui.');
    }

    public function destroy(HomeCard $home_card)
    {
        if (!str_contains($home_card->image, 'images/')) {
            Storage::disk('public')->delete($home_card->image);
        }
        $home_card->delete();
        return redirect()->route('admin.home_cards.index')->with('success', 'Card berhasil dihapus.');
    }
}
