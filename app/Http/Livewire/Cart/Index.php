<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Index extends Component
{

    public $cartItems;

    public function mount()
    {
        $this->cartItems = Cart::content();
    }

    public function render()
    {
        $totalQuantity = Cart::count();
        $totalPrice = Cart::subtotal();


        return view('livewire.cart.index', compact('totalQuantity', 'totalPrice'));
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        $this->cartItems = Cart::content();
        $this->emit('cart_update');
    }

    public function clearCart()
    {
        Cart::destroy();
        $this->cartItems = Cart::content();
        $this->emit('cart_update');
    }

    public function increaseQuantity($rowId)
    {
        // Check if the row ID exists in the cart
        $item = Cart::get($rowId);
        if (!$item) {
            return;
        }

        // Update the cart item quantity
        Cart::update($rowId, $item->qty + 1);

        // Update the cart items property
        $this->cartItems = Cart::content();

        $this->emit('cart_update');
    }

    public function decreaseQuantity($rowId)
    {
        // Check if the row ID exists in the cart
        $item = Cart::get($rowId);
        if (!$item) {
            return;
        }

        // Update the cart item quantity
        Cart::update($rowId, $item->qty - 1);

        // Update the cart items property
        $this->cartItems = Cart::content();

        $this->emit('cart_update');
    }


    public function updatedCartItems($value, $key)
    {
        // Get the row ID from the key (e.g. "a775bac9cff7dec2b984e023b95206aa.qty" -> "a775bac9cff7dec2b984e023b95206aa")
        $rowId = explode('.', $key)[0];

        // Check if the row ID exists in the cart
        $item = Cart::get($rowId);
        if (!$item) {
            return;
        }

        // Update the cart item quantity
        Cart::update($rowId, $value);

        // Update the cart items property
        $this->cartItems = Cart::content();

        $this->emit('cart_update');
    }

    public function checkout()
    {
    }
}
