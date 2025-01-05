<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    // Menampilkan halaman detail gambar berdasarkan ID
    public function show($id)
    {
        $image = Image::find($id);

        // Pastikan gambar ditemukan
        if (!$image) {
            abort(404, 'Data not found');
        }

        return view('components.detail', compact('image'));
    }

    public function addToCart(Request $request)
    {
        // Jika pengguna belum login, alihkan ke halaman login
        if (!Auth::check()) {
            return response()->json(['message' => 'You need to login first.'], 401);
        }

        $userId = Auth::id();

        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:images,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cari gambar berdasarkan ID
        $image = Image::find($request->product_id);

        // Jika gambar tidak ditemukan
        if (!$image) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Menambahkan item ke keranjang
        $cart = Cart::firstOrCreate(['id_user' => $userId]);  // Membuat atau mengambil keranjang yang ada

        // Cek apakah item sudah ada di keranjang
        $cartItem = CartItem::where('id_cart', $cart->id_cart)
                            ->where('id_image', $image->id)
                            ->first();

        if ($cartItem) {
            // Jika item sudah ada, update jumlahnya
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Jika item belum ada, tambahkan item baru ke keranjang
            CartItem::create([
                'id_cart' => $cart->id_cart,
                'id_image' => $image->id,
                'product_name' => $image->title,  // Menambahkan product_name (judul gambar)
                'quantity' => $request->quantity,
                'price' => $image->price,
            ]);
        }

        // Pengalihan ke halaman keranjang setelah berhasil menambah
        return response()->json(['message' => 'Item added to cart successfully!']);
    }


    // Pengalihan setelah login
    public function redirectAfterLogin(Request $request)
    {
        // Mengambil ID gambar dari input
        $imageId = $request->input('id_image');

        // Jika ID gambar ada, alihkan ke halaman detail gambar
        if ($imageId) {
            return redirect()->route('image.detail', ['id' => $imageId]);
        }

        // Jika tidak ada ID gambar, alihkan ke halaman utama atau koleksi
        return redirect()->route('collection');
    }
}
