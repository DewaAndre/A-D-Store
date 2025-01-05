<?php

namespace App\Http\Controllers;

use App\Models\Image;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data berdasarkan kategori
        $categories = ['T-shirt', 'Long-Sleeve', 'Pants', 'Shoes'];
        $imagesByCategory = [];

        foreach ($categories as $category) {
            // Membatasi hasil menjadi 10 gambar per kategori
            $imagesByCategory[strtolower(str_replace(' ', '_', $category))] = Image::where('kategori', $category)
            ->take(10)
            ->get(['id_image', 'path', 'title', 'harga', 'stok']);
        }

        // Mengirimkan data ke view
        return view('home', ['imagesByCategory' => $imagesByCategory]);
    }

    
}
