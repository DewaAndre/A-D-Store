<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout; 

class CheckoutsController extends Controller
{
    // Menampilkan data checkout
    public function index()
    {
        // Ambil semua data checkout
        $checkouts = Checkout::all();

        // Tampilkan data checkout ke view admin.checkout
        return view('admin.checkout', compact('checkouts'));
    }

    // Method untuk menandai pembayaran sebagai 'sudah_dibayar'
    public function markAsPaid($id)
    {
        // Temukan checkout berdasarkan ID
        $checkout = Checkout::findOrFail($id);
        
        // Update status checkout menjadi 'sudah_dibayar'
        $checkout->status = 'sudah_dibayar';
        $checkout->save();

        // Redirect kembali ke halaman checkout dengan pesan sukses
        return redirect()->route('admin.checkouts.index')->with('success', 'Pembayaran berhasil diubah menjadi lunas.');
    }
}

