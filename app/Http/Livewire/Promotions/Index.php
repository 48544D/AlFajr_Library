<?php

namespace App\Http\Livewire\Promotions;

use App\Models\control;
use Livewire\Component;
use App\Models\Promotions;
use Livewire\WithPagination;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 28;
    public $subCategory_id;

    public function render()
    {
        $promotions = Promotions::with('product')->paginate($this->perPage);
        $panierActif = control::first()->PanierActif;

        return view('livewire.promotions.index', [
            'promotions' => $promotions,
            'panierActif' => $panierActif,
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
