<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Image;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Di dalam LoginController
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('name', 'password');
        $validator = Validator::make($credentials, [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses login
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Ambil pengguna yang terautentikasi

            // Ambil ID gambar yang dipilih setelah login
            $imageId = $request->input('id_image'); // Pastikan ada id_image
            
            if ($imageId) {
                // Arahkan pengguna ke halaman detail gambar setelah login
                return redirect()->route('image.detail', ['id' => $imageId]);
            }

            // Jika tidak ada id_image, alihkan ke halaman koleksi
            return redirect()->route('collection.index');
        }

        // Jika login gagal
        return redirect()->back()->withErrors(['name' => 'Invalid credentials']);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/'); 
    }

}
