<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //MOVIE GENRES
        $genres = [
            'action',
            'animation',
            'comedy',
            'compilation',
            'crime',
            'disaster',
            'documentary',
            'drama',
            'fantasy',
            'horror',
            'musical',
            'mystery',
            'psychological',
            'romance',
            'techno',
            'thriller',
            'western',
        ];

        foreach ($genres as $genre) {
            DB::table('movie_genres')->insert([
                'title' => $genre
            ]);
        }


        //MOVIE LANGUAGES
        $languages = ['Turkish', 'English', 'Spanish', 'German', 'Italian', 'French', 'Arabic'];
        foreach ($languages as $language) {
            DB::table('movie_languages')->insert([
                'title' => $language
            ]);
        }


        //MOVIE WARNINGS
        DB::table('movie_warnings')->insert([
            [
                'id' => 1,
                'title' => '6 YAŞ ALTI',
                'description' => '6 yaş altı izleyici kitlesi aile eşliğinde izleyebilir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 2,
                'title' => '6 YAŞ ve ÜZERİ',
                'description' => '6 yaş ve üzeri izleyici kitlesi içindir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 3,
                'title' => '10 YAŞ ALTI',
                'description' => '10 yaş altı izleyici kitlesi aile eşliğinde izleyebilir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 4,
                'title' => '10 YAŞ ve Üzeri',
                'description' => '10 yaş ve üzeri izleyici kitlesi içindir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 5,
                'title' => '13 YAŞ ALTI',
                'description' => '13 yaş altı izleyici kitlesi aile eşliğinde izleyebilir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 6,
                'title' => '13 YAŞ ve Üzeri',
                'description' => '13 yaş ve üzeri izleyici kitlesi içindir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 7,
                'title' => '16 YAŞ ve Üzeri',
                'description' => '16 yaş ve üzeri izleyici kitlesi içindir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 8,
                'title' => '18 YAŞ ve Üzeri',
                'description' => '18 yaş ve üzeri izleyici kitlesi içindir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 9,
                'title' => 'GENEL İZLEYİCİ',
                'description' => 'Genel izleyici kitlesi içindir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 10,
                'title' => 'ŞİDDET veya KORKU',
                'description' => 'Şiddet veya korku unsurları içerir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 11,
                'title' => 'CİNSELLİK veya ÇIPLAKLIK',
                'description' => 'Cinsellik veya çıplaklık unsurları içerir.',
                'icon_filename' => 'icon',
            ],
            [
                'id' => 12,
                'title' => 'OLUMSUZ ÖRNEK',
                'description' => 'Olumsuz örnek oluşturabilecek unsurlar içerir.',
                'icon_filename' => 'icon',
            ]
        ]);
    }
}
