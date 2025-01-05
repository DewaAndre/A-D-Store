<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Checkout;
use App\Models\Image; 

class CheckoutController extends Controller
{
    public function show()
    {
        // Ambil semua item cart untuk user yang sedang login
        $cartItems = Cart::where('id_user', auth()->id())->get();

        // Hitung subtotal berdasarkan harga dan jumlah
        $subTotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        // Tampilkan view dengan menggunakan data cartItems
        return view('components.order', compact('cartItems', 'subTotal'));
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email',
            'payment_method' => 'required|string',
            'additional_info' => 'nullable|string',
            'total' => 'required|numeric'
        ]);

        // Ambil item cart berdasarkan relasi
        $cart = Cart::where('id_user', auth()->id())->first(); // Ambil cart yang sesuai dengan user
        $cartItems = $cart ? $cart->cartItems : collect(); // Ambil semua item dari cart jika ada

        // Pastikan cartItems tidak kosong
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Hitung total harga berdasarkan item di keranjang
        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        // Debug total untuk memastikan perhitungan
        \Log::info("Total: {$total}");

        // Buat entri checkout baru
        $order = Checkout::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'payment_method' => $validated['payment_method'],
            'additional_info' => $validated['additional_info'],
            'total' => $total,
        ]);

        // Simpan order items ke dalam tabel order_items dan update stok di tabel images
        foreach ($cartItems as $item) {
            $quantity = $item->quantity ?? 1;
            $idImage = $item->id_image ?? 1;
            $price = $item->price ?? 0;

            // Simpan item ke order_items
            OrderItem::create([
                'checkout_id' => $order->id,
                'id_image' => $idImage,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            // Kurangi stok barang di tabel images
            $image = Image::find($idImage); // Ambil data gambar berdasarkan id
            if ($image) {
                $image->stok = max(0, $image->stok - $quantity); // Kurangi stok dan pastikan tidak negatif
                $image->save(); // Simpan perubahan stok
            }
        }

        // Menghapus data cart setelah checkout
        Cart::where('id_user', auth()->id())->delete();

        return redirect()->route('order.success')->with('order', $order);
    }
}
