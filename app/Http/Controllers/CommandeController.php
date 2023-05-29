<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

class CommandeController extends Controller
{
    public function index()
    {
        $totalQuantity = Cart::count();
        $totalPrice = Cart::subtotal();
        return view('commande.index', compact('totalQuantity', 'totalPrice'));
    }
}
