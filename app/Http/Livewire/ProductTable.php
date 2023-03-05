<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductTable extends Component
{
    public array $quantity = [];

    public function mount()
    {
        $products = Product::latest()->paginate(8);
        foreach ($products as $product) {
            $this->quantity[$product->id] = 1;
        }
    }

    public function render()
    {
        $products = Product::latest()->paginate(8);

        return view('livewire.product-table', compact('products'));
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        Cart::add(
            $product->id,
            $product->name,
            $this->quantity[$product->id],
            $product->price
        );

        $this->emit('cart_update');
    }
}
