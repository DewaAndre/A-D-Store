<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Pastikan hanya pengguna yang sudah login yang bisa mengakses metode ini
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'You need to login first.'], 401);
        }

        $userId = Auth::id();

        $request->validate([
            'product_id' => 'required|exists:images,id_image',
            'quantity' => 'required|integer|min:1',
        ]);

        $image = Image::find($request->product_id);

        if (!$image) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Create cart if not exists for the user
        $cart = Cart::firstOrCreate(['id_user' => $userId]);

        // Check if the product already exists in the cart
        $cartItem = CartItem::where('id_cart', $cart->id_cart)
                            ->where('id_image', $image->id_image)
                            ->first();

        if ($cartItem) {
            // If the product exists, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // If the product does not exist, create a new entry
            CartItem::create([
                'id_cart' => $cart->id_cart,
                'id_image' => $image->id_image,
                'quantity' => $request->quantity,
                'price' => $image->harga, // Assuming 'harga' is the price in the images table
            ]);
        }

        return response()->json(['message' => 'Item added to cart successfully!']);
    }


    public function viewCart()
    {
        $user = auth()->user();
        $cart = Cart::where('id_user', $user->id)->first();

        if ($cart) {
            // Mengambil item cart yang sudah terhubung dengan gambar
            $cartItems = $cart->cartItems()->with('image')->get();
            return view('components.cart', compact('cartItems')); // Mengirim $cartItems ke view
        }

        return view('components.cart', ['cartItems' => []]);
    }


    public function removeItem($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->delete();

        return redirect()->route('cart.index')->with('message', 'Item removed from cart');
    }


    public function updateItemQuantity(Request $request, $itemId, $action)
    {
        $cartItem = CartItem::findOrFail($itemId);

        if ($action === 'increase') {
            $cartItem->increment('quantity');
        } elseif ($action === 'decrease' && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        }

        return redirect()->route('cart.index')->with('message', 'Quantity updated');
    }


    public function cartItemCount()
    {
        $cart = Cart::where('id_user', auth()->id())->first();
        return $cart ? $cart->cartItems()->count() : 0;
    }

    // Method untuk menghitung jumlah item di cart
    public function cartCount()
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $cart = Cart::where('id_user', $userId)->first();

        if ($cart) {
            // Mengambil dan mengelompokkan berdasarkan id_card serta menghitung quantity
            $cartItems = $cart->cartItems()
                            ->groupBy('id_card')
                            ->map(function ($items) {
                                return $items->sum('quantity'); // Menghitung jumlah berdasarkan quantity
                            });
        } else {
            $cartItems = [];
        }

        return response()->json($cartItems); // Mengembalikan data item dalam format JSON
    }


    public function deleteItem($itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->delete();

        return redirect()->route('cart.index')->with('message', 'Item removed from cart');
    }

    public function checkout()
    {
        $user = auth()->user();
        $cart = Cart::where('id_user', $user->id)->first();

        if ($cart) {
            // Mengambil item cart yang terkait dengan produk
            $cartItems = $cart->cartItems()->with('image')->get();

            // Menghitung subtotal
            $subTotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            // Mengirim data cartItems dan subtotal ke halaman checkout
            return view('components.checkout', compact('cartItems', 'subTotal')); // Mengirim data ke view checkout
        }

        return redirect()->route('cart.index')->with('message', 'No items in cart');
    }

}
