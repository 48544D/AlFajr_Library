<?php

namespace App\Http\Livewire;

use App\Models\control;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductShow extends Component
{
    public $product;
    public $quantity = 1;

    public function render()
    {
        // checking if this product is in promotion table
        $promotion = $this->product->promotion()->first();
        $panierActif = control::first()->PanierActif;

        return view('livewire.product-show', [
            'promotion' => $promotion,
            'panierActif' => $panierActif
        ]);
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
                'qty' => $this->quantity,
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
                'qty' => $this->quantity,
                'price' => $product->price,
                'weight' => 0,
                'options' => [
                    'image' => $product->image,
                ]
            ]);
        }

        $this->emit('cart_update');

        session()->flash('LivewireMessage', 'Produit ajouté au panier.');
        $this->emit('alert_remove');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }
}
