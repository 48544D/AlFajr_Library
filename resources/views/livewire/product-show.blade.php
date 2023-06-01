<div>
    <div class="container">
        <div class="row product-container">
            <div class="col-md-6 left">
                <img src="{{ asset('storage/'.$product->image) }}" alt="Image indisponible" class="img-fluid">
            </div>
            <div class="col-md-6 right">
                <h1>{{ $product->name }}</h1>
                <div class="details">
                    <p>
                        <span>Reference:</span> {{ $product->reference }}
                    </p>
                    <p class="price">
                        <span>Prix:</span>
                        @if ($product->promotion)
                            <span class="line-through">{{ $product->price }} DH</span> ~ <span class="product-prom"> {{ $product->promotion->prix_prom }} DH</span>
                        @else
                            {{ $product->price }} DH
                        @endif
                    </p>
                    @if (!$product->estDisponible)
                        <div class="product-quantity">
                            <button class="product-button" disabled>Rupture de stock</button>
                        </div>
                    @elseif (Cart::content()->where('id', $product->id)->first())
                            <div class="product-quantity">
                                <button class="product-button" disabled>Ajouté au panier</button>
                            </div>
                    @else
                        <form wire:submit.prevent="addToCart({{ $product->id }})" action="" method="post" class="product-quantity">
                            @csrf
                            <div class="quantity">
                                <label for="quantity">Qty:</label>
                                <input type="number" wire:model="quantity" min="1">
                            </div>
                            <button type="submit" class="product-button">Ajouter au panier</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-flash-message/>
</div>
