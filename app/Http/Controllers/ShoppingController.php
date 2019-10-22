<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Stripe\Stripe;
use Stripe\Charge;

class ShoppingController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        $cartItem = Cart::add($product->id, $product->name, $request->qty, $product->price);
        Cart::associate($cartItem->rowId, 'App\Product');
        return redirect()->route('cart');
        
    }

    public function cart()
    {
        return view('cart');
    }

    public function deleteItem($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function reduceItem($id, $qty)
    {
        Cart::update($id, $qty-1);
        return redirect()->back();
    }

    public function increaseItem($id, $qty)
    {
        Cart::update($id, $qty+1);
        return redirect()->back();
    }

    public function pay()
    {
        Stripe::setApiKey("sk_test_0FtAjk7wtvBfkRLQzdpeFMVi00l2SL3oPn");

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'selling products',
            'source' => request()->stripeToken
        ]);

        Cart::destroy();

        return redirect()->route('index');
    }
}
