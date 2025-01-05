<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders()
    {
        // Ambil data pesanan (checkout) dengan relasi orderItems dan image
        $checkouts = Checkout::where('user_id', auth()->id())
            ->with(['orderItems.image']) // Pastikan relasi 'image' di-load
            ->get();

        // Kirim data ke view
        return view('components.order', compact('checkouts'));
    }


    public function success(Request $request)
    {
        // Validasi input order ID (jika perlu)
        $validatedData = $request->validate([
            'checkout' => 'required|integer|exists:checkouts,id',
        ]);

        // Ambil checkout berdasarkan ID dan pastikan checkout milik user yang sedang login
        $checkouts = Checkout::where('user_id', auth()->id())
                     ->with('orderItems.image')
                     ->get();


        return view('order.success', compact('checkout'));
    }

}

