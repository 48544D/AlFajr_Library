<?php

namespace App\Http\Livewire\SubCategories;

use App\Models\Product;
use App\Models\subCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 28;
    public $subCategory_id;
    
    public function render()
    {
        $products = Product::where('sub_category_id', $this->subCategory_id)->paginate($this->perPage);

        return view('livewire.sub-categories.index', [
            'products' => $products
        ]);
    }

    public function mount(subCategory $subCategory)
    {
        $this->subCategory_id = $subCategory->id;
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

        session()->flash('message', 'Produit ajouté au panier !');
        $this->emit('alert_remove');
    }
}
