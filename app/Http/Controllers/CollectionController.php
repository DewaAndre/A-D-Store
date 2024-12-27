<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        // Daftar kategori produk
        $categories = ['T-shirt', 'Long Sleeve', 'Long Pants', 'Shoes'];
        $imagesByCategory = [];

        // Memperoleh data gambar berdasarkan kategori dan memaginasi hasilnya
        foreach ($categories as $category) {
            $imagesByCategory[strtolower(str_replace(' ', '_', $category))] = Image::where('kategori', $category)
                ->paginate(10) // Menambahkan pagination untuk 10 gambar per halaman
                ->appends($request->query()); // Menambahkan parameter query untuk tetap menyertakan query di pagination
        }

        // Mengirimkan data ke view
        return view('collection', ['imagesByCategory' => $imagesByCategory]);
    }
}
