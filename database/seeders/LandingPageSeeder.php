<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;
use App\Models\HomeCard;
use App\Models\Gallery;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        // Website Settings (Hero and About)
        $settings = [
            'home_hero_title' => 'HEALTHY TASTY FOOD',
            'home_hero_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue non elementum commodo, elit libero convallis nunc, eget varius orci enim sed augue. Nullam lacus diam, rutrum in dictum ac, sagittis vitae nibh.',
            'home_about_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.',
            'contact_email' => 'tastyfood@gmail.com',
            'contact_phone' => '+62 812 3456 7890',
            'contact_location' => 'Kota Bandung, Jawa Barat',
            'contact_maps_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.573116!3d-6.903444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e63982548ad7%3A0x391dbad39031336a!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000',
        ];

        foreach ($settings as $key => $value) {
            WebsiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Home Cards
        $cards = [
            [
                'image' => 'images/img-1.png',
                'title' => 'LOREM IPSUM',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in tristique.',
            ],
            [
                'image' => 'images/img-2.png',
                'title' => 'LOREM IPSUM',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in tristique.',
            ],
            [
                'image' => 'images/img-3.png',
                'title' => 'LOREM IPSUM',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in tristique.',
            ],
            [
                'image' => 'images/img-4.png',
                'title' => 'LOREM IPSUM',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in tristique.',
            ],
        ];

        foreach ($cards as $card) {
            HomeCard::create($card);
        }

        // Gallery Carousel (Seed some existing images as carousel)
        Gallery::whereIn('id', [1, 2, 3])->update(['is_carousel' => true]);
        // If IDs don't exist yet (empty table), we'll let the user manage it later, 
        // but typically a fresh install might have some entries.
    }
}
