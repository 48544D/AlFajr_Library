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
                    <form wire:submit.prevent="addToCart({{ $product->id }})" action="{{ route('cart.store')}}" method="post" class="product-quantity">
                        @csrf
                        <button type="submit" class="product-button">Add to Cart</button>
                    </form>
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