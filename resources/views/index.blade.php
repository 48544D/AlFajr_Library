<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>
<body>
    <x-navbar/>
    <main>
        <div class="product-container">
        @foreach ($products as $product)
            <div class="product-card">
              <div class="product-image">
                <img src="{{ $product->image }}" alt="Product Image" />
              </div>
              <div class="product-details">
                <div class="product-name">{{ $product->name }}</div>
                <div class="product-price">{{ $product->price }} DH</div>
                <div class="product-description">
                  {{ $product->description }}
                </div>
                <form action="{{ route('cart.store')}}" method="po" class="product-quantity">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="number" name="quantity" id="quantity" value="1">
                  <button type="submit" class="product-button">Add to Cart</button>
                </form>
              </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>