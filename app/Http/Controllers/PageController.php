<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\AboutContent;
use App\Models\CompanyProfile;
use App\Models\HomeCard;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
        $news = News::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(4)->get();
        $settings = WebsiteSetting::all()->pluck('value', 'key');
        return view('welcome', compact('news', 'galleries', 'settings'));
    }

    public function home() {
        $news = News::latest()->take(4)->get();
        $galleries = Gallery::latest()->take(6)->get();
        $cards = HomeCard::all();
        $settings = WebsiteSetting::all()->pluck('value', 'key');
        return view('home', compact('news', 'galleries', 'cards', 'settings'));
    }

    public function berita() {
        $news = News::latest()->paginate(9);
        $settings = WebsiteSetting::all()->pluck('value', 'key');
        return view('berita', compact('news', 'settings'));
    }

    public function galeri() {
        $galleries = Gallery::latest()->get();
        $carouselImages = Gallery::where('is_carousel', true)->latest()->get();
        $settings = WebsiteSetting::all()->pluck('value', 'key');
        return view('galeri', compact('galleries', 'carouselImages', 'settings'));
    }

    public function tentang() {
        $aboutContents = AboutContent::all();
        $companyProfile = CompanyProfile::first();
        $settings = WebsiteSetting::all()->pluck('value', 'key');
        return view('tentang', compact('aboutContents', 'companyProfile', 'settings'));
    }

    public function kontak() {
        $settings = WebsiteSetting::all()->pluck('value', 'key');
        return view('kontak', compact('settings'));
    }
}
