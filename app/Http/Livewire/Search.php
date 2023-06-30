<?php

namespace App\Http\Livewire;

use App\Models\control;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Search extends Component
{
    protected $perPage = 28;

    public function render()
    {
        $products = Product::filter(request(['search']))->paginate($this->perPage);

        $panierActif = control::first()->PanierActif;
        
        return view('livewire.search', ['products' => $products, 'panierActif' => $panierActif]);
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        // checking if this product is in promotion table
        $promotion = $product->promotion()->first();
        if ($promotion) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $promotion->prix_prom,
                'weight' => 0,
                'options' => [
                    'image' => $product->image,
                    'original_price' => $product->price,
                    'promotion' => 'true'
                ]
            ]);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 0,
                'options' => [
                    'image' => $product->image,
                ]
            ]);
        }


        $this->emit('cart_update');

        session()->flash('LivewireMessage', 'Produit ajouté au panier !');
        $this->emit('alert_remove');

    }
}
