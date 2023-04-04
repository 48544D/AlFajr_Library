<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductShow extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.product-show');
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price
        );

        $this->emit('cart_update');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }
}
