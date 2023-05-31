<div class="product-table">
    @unless (count($products) == 0)
        <div class="product-container">
            @foreach ($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ $product->image ? asset('storage'.$product->image) : asset('storage/images/no-image.png')}}" alt="Image indisponible" />
                    </div>
                    <div class="product-details">
                        <div class="product-info">
                            <div class="product-name">
                                <a href="products/{{$product->id}}">{{ $product->name }}</a>
                            </div>
                            <div class="product-price">
                                @if ($product->promotion)
                                    Prix : <span class="line-through">{{ $product->price }} DH</span> ~ <span class="product-prom"> {{ $product->promotion->prix_prom }} DH</span>
                                @else
                                    Prix : <span>{{ $product->price }} DH</span>
                                @endif
                            </div>
                        </div>
                        @if (!$product->estDisponible)
                            <div class="product-quantity">
                                <button class="product-button" disabled>Produit épuisé</button>
                            </div>
                        @elseif (Cart::content()->where('id', $product->id)->first())
                            <div class="product-quantity">
                                <button class="product-button" disabled>Ajouté au panier</button>
                            </div>
                            
                        @else
                            <form wire:submit.prevent="addToCart({{ $product->id }})" class="product-quantity">
                                @csrf
                                <button type="submit" class="product-button">Ajouter au panier</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-product">
            <h2>Aucun produit trouvé</h2>
        </div>
    @endunless
    
    <div class="pagination-container">
        {{ $products->links() }}
    </div>

    <x-flash-message/>
</div>    

