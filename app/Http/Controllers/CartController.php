<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getCart();
        return view('cart.index', compact('cart'));
    }

    public function store(Request $request, Product $product)
    {
        $cart = $this->getCart();
        
        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }

    private function getCart()
    {
        if (Auth::check()) {
            return Cart::firstOrCreate(['user_id' => Auth::id()]);
        }

        $sessionId = Session::getId();
        return Cart::firstOrCreate(['session_id' => $sessionId]);
    }
}
