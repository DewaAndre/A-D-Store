<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->input('kategori');
        
        // Jika kategori dipilih, filter gambar berdasarkan kategori
        if ($kategori) {
            $images = Image::where('kategori', $kategori)->paginate(10);
        } else {
            // Ambil semua gambar jika tidak ada kategori yang dipilih
            $images = Image::paginate(10);
        }
        
        // Ambil kategori unik untuk menampilkan kategori dalam tab
        $categories = Image::select('kategori')->distinct()->get();

        return view('admin.image', compact('images', 'categories'));
    }

    // create
    public function create()
    {
        return view('admin.create-image');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_seller' => 'nullable|integer',
        ]);

        // Simpan data gambar
        $image = new Image();
        $image->title = $request->input('title');
        $image->harga = $request->input('harga');
        $image->stok = $request->input('stok');
        $image->path = $request->input('path');  // Menyimpan path gambar
        $image->kategori = $request->input('kategori');
        $image->deskripsi = $request->input('deskripsi');
        $image->id_seller = $request->input('id_seller');

        // Simpan data ke dalam tabel images
        $image->save();

        // Redirect ke halaman daftar gambar dengan pesan sukses
        return redirect()->route('images')->with('success', 'Image created successfully.');
    }



    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.edit-image', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'path' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Perbarui data gambar
        $image->title = $request->input('title');
        $image->harga = $request->input('harga');
        $image->stok = $request->input('stok');
        $image->path = $request->input('path');
        $image->kategori = $request->input('kategori');
        $image->deskripsi = $request->input('deskripsi');

        // Jika ada gambar yang diunggah, simpan gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama (jika ada)
            if ($image->image_path && Storage::exists('public/' . $image->image_path)) {
                Storage::delete('public/' . $image->image_path);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
            $image->image_path = $imagePath;
        }

        // Simpan data yang diperbarui ke database
        $image->save();

        // Redirect ke halaman daftar gambar dengan pesan sukses
        return redirect()->route('images')->with('success', 'Image updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan gambar berdasarkan ID
        $image = Image::findOrFail($id);

        // Hapus gambar dari penyimpanan (jika ada)
        if ($image->image_path && Storage::exists('public/' . $image->image_path)) {
            Storage::delete('public/' . $image->image_path);
        }

        // Hapus data gambar dari database
        $image->delete();

        // Redirect ke halaman daftar gambar dengan pesan sukses
        return redirect()->route('images')->with('success', 'Image deleted successfully.');
    }

}
