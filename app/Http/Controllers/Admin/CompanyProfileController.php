<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::first();
        if (!$profile) {
            // Jika seeder belum jalan, buat default
            $profile = CompanyProfile::create([
                'title' => 'TASTY FOOD',
                'desc_bold' => 'Lorem ipsum...',
                'desc_muted' => 'Lorem ipsum...',
                'image1' => 'images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg',
                'image2' => 'images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
            ]);
        }
        return view('admin.company_profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = CompanyProfile::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'desc_bold' => 'required',
            'desc_muted' => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = $request->only(['title', 'desc_bold', 'desc_muted']);

        if ($request->hasFile('image1')) {
            // Hapus gambar lama jika bukan default image
            if (!str_contains($profile->image1, 'images/')) {
                Storage::disk('public')->delete($profile->image1);
            }
            $data['image1'] = $request->file('image1')->store('profile', 'public');
        }

        if ($request->hasFile('image2')) {
            // Hapus gambar lama jika bukan default image
            if (!str_contains($profile->image2, 'images/')) {
                Storage::disk('public')->delete($profile->image2);
            }
            $data['image2'] = $request->file('image2')->store('profile', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
