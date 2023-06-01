<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CommandeController extends Controller
{
    public function index()
    {
        $totalQuantity = Cart::count();
        $totalPrice = Cart::subtotal();
        return view('commande.index', compact('totalQuantity', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tele' => 'required|numeric',
            'email' => 'required|email',
            'checkbox' => 'required',
        ]);

        $client = new client([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('tele'),
            'email' => $request->get('email'),
        ]);
        $client->save();

        $order = new order(
            [
                'client_id' => $client->id,
                'total_quant' => Cart::count(),
                'total_price' => Cart::subtotal(),
                'estTraite' => false,
            ]
        );
        $order->save();

        foreach (Cart::content() as $item) {
            $order->order_details()->create([
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
        }

        Cart::destroy();

        return redirect()->route('home')->with('message', 'Commande effectuée avec succès !');
    }
}
