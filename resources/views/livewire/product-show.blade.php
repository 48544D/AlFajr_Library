<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p>Prix: {{ $product->price }} Dh</p>
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
</div>
