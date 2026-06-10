<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Product $product)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + 1,
                'price' => $product->price,
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function increase($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);

        $cart->update([
            'quantity' => $cart->quantity + 1,
        ]);

        return redirect()->back();
    }

    public function decrease($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);

        if ($cart->quantity > 1) {
            $cart->update([
                'quantity' => $cart->quantity - 1,
            ]);
        } else {
            $cart->delete();
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);

        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
}