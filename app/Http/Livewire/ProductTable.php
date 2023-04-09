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
    protected $listeners = ['reloadProducts'];

    public $perPage = 8;
    protected $emited_products;

    public function render()
    {
        $products = $this->emited_products ?? Product::paginate($this->perPage);

        return view('livewire.product-table', ['products' => $products]);
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        // dd($product->image);

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

        $this->emit('cart_update');

        session()->flash('message', 'Produit ajouté au panier !');
    }

    public function reloadProducts($query)
    {
        $this->resetPage();
        $this->emited_products = Product::where('name', 'like', '%' . $query . '%')->paginate($this->perPage);
        $this->render();
    }
}
