<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin Controller',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]
    );

    \App\Models\User::firstOrCreate(
        ['email' => 'user@gmail.com'],
        [
            'name' => 'Regular User',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]
    );

    // Data Berita (Bikin 4 atau lebih)
    $berita = [
        [
            'title' => 'Apa Saja Makanan Khas Nusantara?',
            'slug' => 'makanan-khas-nusantara',
            'excerpt' => 'Indonesia memiliki ragam kuliner yang sangat kaya dari Sabang sampai Merauke...',
            'body' => 'Isi lengkap berita makanan nusantara ada di sini. Mulai dari Rendang hingga Papeda.',
            'image' => 'berita1.jpg',
        ],
        [
            'title' => 'Rahasia Bumbu Dapur Tradisional',
            'slug' => 'rahasia-bumbu-dapur',
            'excerpt' => 'Mengenal rempah-rempah asli Indonesia yang membuat masakan menjadi lezat...',
            'body' => 'Rempah seperti kunyit, jahe, dan lengkuas adalah kunci kelezatan masakan kita.',
            'image' => 'berita2.jpg',
        ],
        [
            'title' => 'Tips Memilih Sayuran Segar',
            'slug' => 'tips-sayuran-segar',
            'excerpt' => 'Cara mudah membedakan sayuran organik dan non-organik di pasar modern...',
            'body' => 'Pastikan warna sayuran cerah dan teksturnya masih renyah saat ditekan.',
            'image' => 'berita3.jpg',
        ],
        [
            'title' => 'Tren Kuliner Sehat 2026',
            'slug' => 'tren-kuliner-2026',
            'excerpt' => 'Makanan berbasis tanaman mulai diminati oleh generasi muda saat ini...',
            'body' => 'Banyak resto sekarang mulai menyajikan menu vegan yang tak kalah enak dari daging.',
            'image' => 'berita4.jpg',
        ],
    ];

    foreach ($berita as $item) {
        \App\Models\News::updateOrCreate(['slug' => $item['slug']], $item);
    }

    // Data Galeri (Bikin 8 biar penuh grid-nya)
    for ($i = 1; $i <= 8; $i++) {
        \App\Models\Gallery::updateOrCreate(
            ['image' => "galeri$i.jpg"],
            ['category' => ($i % 2 == 0) ? 'Lunch' : 'Breakfast']
        );
    }
}
}
