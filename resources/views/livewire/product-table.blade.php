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
                    <form wire:submit.prevent="addToCart({{ $product->id }})" action="{{ route('cart.store')}}" method="post" class="product-quantity">
                        @csrf
                        <input wire:model="quantity.{{ $product->id }}" type="number" id="quantity" >
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