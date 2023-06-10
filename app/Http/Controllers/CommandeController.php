<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

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
        if (Cart::count() == 0) {
            return redirect()->route('home')->with('message', 'Votre panier est vide !');
        }
        
        DB::beginTransaction();
        try {
                $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                    'tele' => 'required|numeric|digits:10',
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

                // reference format : day-month-year-client_id
                $ref = date('dmY') . $client->id;

                $order = new order(
                    [
                        'reference' => $ref,
                        'client_id' => $client->id,
                        'total_quant' => Cart::count(),
                        'total_price' => doubleval(str_replace(',', '', Cart::subtotal())),
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

                DB::commit();
                session(['ref' => $ref]);
                return redirect()->route('commande.success');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('home')->with('message', 'Une erreur est survenue lors de la commande !');
        }
    }
}
