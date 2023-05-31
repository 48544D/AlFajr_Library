<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<script src="{{ asset('js/navbar.js') }}" defer></script>

<header>
    <div class="top-section">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('storage/images/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="search">
            <form action="/products" method="GET">
                <input type="text" name="search" placeholder="Recherecher" value="{{ request('search') }}">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="cart">
            <a href="{{ route('cart.index') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Panier</span>
                <span>
                    @livewire('cart-counter')
                </span>
            </a>
        </div>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <hr>
    <div class="bottom-section">
        <div class="bottom-search">
            <form action="/products" method="GET">
                <input type="text" name="search" placeholder="Recherecher" value="{{ request('search') }}">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <ul class="ul-container">
            <li>
                <a href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            @foreach ($categories as $category)
                <li class="has-dropdown">
                    <input class="category-checkbox" type="checkbox" name="{{ $category->name }}" id="{{ $category->name }}">
                    <label for="{{ $category->name }}" class="category-name"> {{ $category->name }} </label>
                    
                    <ul class="dropdown">
                        @foreach($category->subCategories as $subCategory)
                            <li class="subcategory"><a href="/subcategories/{{ $subCategory->id }}">{{ $subCategory->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            <li>
                <a href="{{ route('promotions.index') }}">PROMOTIONS</a>
            </li>
            <li>
                <a href="{{ route('maliste.index') }}">MA LISTE</a>
            </li>
        </ul>
    </div>
</header>