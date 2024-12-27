<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($id)
    {
        // Mengambil data gambar berdasarkan id
        $image = Image::find($id);

        // Jika gambar tidak ditemukan, tampilkan error 404
        if (!$image) {
            abort(404, 'Data not found');
        }

        // Mengembalikan view dengan data gambar
        return view('components.detail', compact('image'));
    }
}
