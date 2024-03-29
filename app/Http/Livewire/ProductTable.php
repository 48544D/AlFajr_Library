<?php

namespace App\Http\Livewire;

use App\Models\control;
use App\Models\Product;
use App\Models\Promotions;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // protected $listeners = ['reloadProducts'];

    public $perPage = 28;
    public $promotionLimit = 8;
    // protected $emited_products;

    public function render()
    {
        // $products = $this->emited_products ?? Product::filter(request(['search']))->paginate($this->perPage);
        $promotions = Promotions::with('product')->limit($this->promotionLimit)->get();

        $products = Product::paginate($this->perPage);

        $panierActif = control::first()->PanierActif;

        return view('livewire.product-table', ['promotions' => $promotions, 'products' => $products ,'panierActif' => $panierActif]);
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

    // public function reloadProducts($query)
    // {
    //     $this->resetPage();
    //     $this->emited_products = Product::where('name', 'like', '%' . $query . '%')->paginate($this->perPage);
    //     $this->render();
    // }
}
