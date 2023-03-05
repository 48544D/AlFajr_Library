<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    // add to cart
    public function store(Request $request)
    {
        // $product = Product::findOrFail($request->input('product_id'));

        // Cart::add(
        //     $product->id,
        //     $product->name,
        //     $request->quantity,
        //     $product->price
        // );

        // return redirect()->route('home');
    }
}
