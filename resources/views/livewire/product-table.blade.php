<div>
    <h1 class="text-center">Promotions</h1> 
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
                            @if (!$panierActif)
                                <div class="product-quantity">
                                    <button class="product-button" disabled>Panier désactivé</button>
                                </div>
                            @elseif (!$promotion->product->estDisponible)
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
                <div class="product-card" style="align-self: center">
                    <h4 class="text-center m-0"><a style="text-decoration: none;" href="{{ route('promotions.index') }}">Voir tous  <i class="fa fa-arrow-right" aria-hidden="true"></i></a></h4>
                </div>
            </div>
        @else
            <div class="no-product">
                <h2>Pas de promotions</h2>
            </div>
        @endunless
    </div>

    <h1 class="text-center">Tous les produits</h1>
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
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                </div>
                                <div class="product-price">
                                    @if ($product->promotion)
                                        Prix : <span class="line-through">{{ $product->price }} DH</span> ~ <span class="product-prom"> {{ $product->promotion->prix_prom }} DH</span>
                                    @else
                                        Prix : <span>{{ $product->price }} DH</span>
                                    @endif
                                </div>
                            </div>
                            @if (!$panierActif)
                                <div class="product-quantity">
                                    <button class="product-button" disabled>Panier désactivé</button>
                                </div>
                            @elseif (!$product->estDisponible)
                                <div class="product-quantity">
                                    <button class="product-button" disabled>Rupture de stock</button>
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
</div>