<div>
    <div class="cart-container">
        <div class="row justify-content-between">
        @if(count($cartItems) > 0)
            <div class="col-md-8 table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap">
                                            <div class="cart-img">
                                                <img src="{{ asset('storage/' . $item->options->image) }}" alt="Image indisponible">
                                            </div>
                                            <div class="cart-info">
                                                <h4>{{ $item->name }}</h4>
                                                @if ($item->options->promotion)
                                                    <p><span>Prix:</span> <span class="line-through">{{ $item->options->original_price }} DH</span> ~ <span class="product-prom"> {{ $item->price }} DH</span></p>
                                                @else
                                                    <p><span>Prix:</span> {{ $item->price }} DH</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-quantity">
                                            <button wire:click.prevent.debounce="decreaseQuantity('{{ $item->rowId }}')" @if ($item->qty == 1)
                                                disabled
                                            @endif>
                                                <span>&#8722;</span>
                                            </button>
                                            <input type="number" wire:model.lazy="cartItems.{{ $item->rowId }}.qty" min="1">
                                            <button wire:click.prevent.debounce="increaseQuantity('{{ $item->rowId }}')">
                                                <span>&#43;</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td>{{ $item->subtotal }} DH</td>
                                    <td>
                                        <a class="btn btn-danger" href="#" wire:click.prevent="removeItem('{{ $item->rowId }}')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="col-md-3 cart-checkout">
                <h3>Panier</h3>
                <div class="cart-summary">
                    <div class="cart-total">
                        <p>Quantité Totale: {{ $totalQuantity }}</p>
                        <p>Prix Total: {{ $totalPrice }} DH</p>
                    </div>
                    <a href="{{ route('commande.index') }}" class="btn btn-success">Commander</a>
                    <button class="btn btn-danger" wire:click="clearCart">Vider le panier</button>
                </div>
            </div>
        @else
            <h1 class="col-md-7 text-center">Votre panier est vide</h1>
            <div class="col-md-3 cart-checkout">
                <h3>Panier</h3>
                <div class="cart-summary">
                    <div class="cart-total">
                        <p>Quantité Totale: {{ $totalQuantity }}</p>
                        <p>Prix Total: {{ $totalPrice }} DH</p>
                    </div>
                    <button class="btn btn-danger" wire:click="clearCart" disabled>Vider le panier</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
