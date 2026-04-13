<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $news = News::latest()->take(4)->get(); // Ambil 4 berita terbaru
        $galleries = Gallery::latest()->take(6)->get();
        return view('home', compact('news', 'galleries'));
    }

    public function berita() {
        $allNews = News::all();
        return view('berita', ['news' => $allNews]);
    }

    public function galeri() {
        $galleries = Gallery::latest()->get();
        return view('galeri', compact('galleries'));
    }

    public function tentang() {
        return view('tentang');
    }

    public function kontak() {
        return view('kontak');
    }
}
