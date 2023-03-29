<div class="product-container">
    @unless (count($products) == 0)
        @foreach ($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ $product->image }}" alt="Product Image" />
                </div>
                <div class="product-details">
                    <div class="product-info">
                        <div class="product-name">
                            {{ $product->name }}
                        </div>
                        <div class="product-price">
                            {{ $product->price }} DH
                        </div>
                    </div>
                    @if (Cart::content()->where('id', $product->id)->first())
                        <div class="product-quantity">
                            <button class="product-button" disabled>Added to Cart</button>
                        </div>
                        
                    @else
                        
                    <form wire:submit.prevent="addToCart({{ $product->id }})" action="{{ route('cart.store')}}" method="post" class="product-quantity">
                        @csrf
                        <button type="submit" class="product-button">Add to Cart</button>
                    </form>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="pagination">
            {{ $products->links() }}
        </div>
    @else
        <div class="center">
            <h2 style="font-family: 'ubuntu', sans-serif">No Products To Show</h2>
        </div>
    @endunless
</div>