@props(['products'])

@unless (count($products) == 0)
    <div class="product-container">
        @foreach ($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ $product->image }}" alt="Product Image" />
                </div>
                <div class="product-details">
                    <div class="product-name">
                        {{ $product->name }}
                    </div>
                    <div class="product-price">
                        {{ $product->price }} DH
                    </div>
                    <div class="product-description">
                        {{ $product->description }}
                    </div>
                    <form action="{{ route('cart.store')}}" method="post" class="product-quantity">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" id="quantity" value="1">
                        <button type="submit" class="product-button">Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="center">
        <h2 style="font-family: 'ubuntu', sans-serif">No Products To Show</h2>
    </div>
@endunless
<div class="p-4 d-flex justify-content-center">
    {{$products->links()}}
</div>