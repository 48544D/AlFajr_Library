<div class="product-table">
    @unless (count($promotions) == 0)
        <div class="product-container">
            @foreach ($promotions as $promotion)
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ $promotion->product->image ? asset('storage'.$promotion->product->image) : asset('storage/images/no-image.png')}}" alt="Image indisponible" />
                    </div>
                    <div class="product-details">
                        <div class="product-info">
                            <div class="product-name">
                                <a href="{{ route('products.show', $promotion->product->id) }}">{{ $promotion->product->name }}</a>
                            </div>
                            <div class="product-price">
                               Prix : <span class="line-through">{{ $promotion->product->price }} DH</span> ~ <span class="product-prom"> {{ $promotion->prix_prom }} DH</span>
                            </div>
                        </div>
                        @if (!$promotion->product->estDisponible)
                            <div class="product-quantity">
                                <button class="product-button" disabled>Rupture de stock</button>
                            </div>
                        @elseif (Cart::content()->where('id', $promotion->product->id)->first())
                            <div class="product-quantity">
                                <button class="product-button" disabled>Ajouté au panier</button>
                            </div>
                            
                        @else
                            <form wire:submit.prevent="addToCart({{ $promotion->product->id }})" class="product-quantity">
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
    
    <div class="pagination">
        {{ $promotions->links() }}
    </div>

    <x-flash-message/>
</div>    