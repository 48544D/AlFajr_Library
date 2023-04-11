<div class="product-table">
    @unless (count($products) == 0)
        <div class="product-container">
            @foreach ($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        {{-- <img src="{{ $product->image }}" alt="Product Image" /> --}}
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" />
                    </div>
                    <div class="product-details">
                        <div class="product-info">
                            <div class="product-name">
                                <a href="products/{{$product->id}}">{{ $product->name }}</a>
                            </div>
                            <div class="product-price">
                                {{ $product->price }} DH
                            </div>
                        </div>
                        
                        @if (Cart::content()->where('id', $product->id)->first())
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
    
    <div class="pagination">
        {{ $products->links() }}
    </div>

    @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="flash-message">
            <p class="m-0">
                {{session('message')}}
            </p>
        </div>
    @endif
</div>    

