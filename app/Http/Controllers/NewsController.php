<?php

namespace App\Http\Controllers;

use App\Models\News; // Jangan lupa import modelnya
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::all(); // Ambil semua data berita
        return view('berita', compact('news'));
    }

    public function show($slug) {
        $detail = News::where('slug', $slug)->firstOrFail();
        return view('detail-berita', compact('detail'));
    }
}
