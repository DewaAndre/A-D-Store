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
            'id_image' => '102',
            'title' => 'Von Dutch T-Shirt 102 White',
            'harga' => 400000,
            'stok' => 303,
            'path' => 'img/t-shirt/t-shirt (2).png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju putih terbaru',
        ]);

        Image::create([
            'id_image' => '103',
            'title' => 'T-SHIRT BLACK',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju4.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);

        Image::create([
            'id_image' => 'T-SHIRT BLACK',
            'title' => 'T-SHIRT BLACK',
            'harga' => 400000,
            'stok' => 120,
            'path' => 'img/t-shirt/baju5.png',
            'kategori' => 'T-Shirt',
            'deskripsi' => 'baju bagus',
        ]);

        Image::create([
            'id_image' => 'T-SHIRT WHITE',
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
