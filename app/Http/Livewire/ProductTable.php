<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 8;

    public function render()
    {
        $products = Product::filter(request(['search']))->paginate($this->perPage);

        return view('livewire.product-table', ['products' => $products]);
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

        session()->flash('message', 'Produit ajouté au panier !');
    }
}
