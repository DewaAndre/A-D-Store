<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        return view('auth.login-admin');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input form login
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencoba login menggunakan Auth
        if (Auth::attempt($validated)) {
            $user = Auth::user();

            // Cek status pengguna setelah login
            if ($user->status === 'admin') {
                // Jika status admin, arahkan ke halaman dashboard admin
                return redirect()->route('admin.index');
            } else {
                // Jika status user, logout dan tampilkan pesan error
                Auth::logout();
                return redirect()->route('admin.login')->withErrors([
                    'email' => 'Akses ditolak. Anda bukan admin.',
                ]);
            }
        }

        // Jika login gagal, redirect kembali ke halaman login dengan pesan error
        return redirect()->route('admin.login')->withErrors([
            'email' => 'Kredensial yang diberikan tidak sesuai.',
        ]);
    }

    // Metode untuk logout
    public function logout(Request $request)
    {
        // Menghapus sesi login admin
        Auth::logout();

        // Mengarahkan kembali ke halaman login
        return redirect()->route('admin.login');
    }
}

