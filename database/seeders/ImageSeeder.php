<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'title' => 'T-SHIRT BLACK',
            'harga' => 40000,
            'stok' => 30,
            'path' => 'img/t-shirt/baju3.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju hitam terbaru',
        ]);

        Image::create([
            'title' => 'T-SHIRT BLACK',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju4.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);

        Image::create([
            'title' => 'T-SHIRT BLACK',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju5.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);

        Image::create([
            'title' => 'T-SHIRT WHITE',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju6.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);

        Image::create([
            'title' => 'T-SHIRT BLUE',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju7.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);

        Image::create([
            'title' => 'T-SHIRT BLACK',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju8.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);
    }
}
