<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductShow extends Component
{
    public $product;
    public $quantity = 1;

    public function render()
    {
        return view('livewire.product-show');
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

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

        $this->emit('cart_update');

        session()->flash('message', 'Produit ajouté au panier.');

        // return redirect()->route('home');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }
}
