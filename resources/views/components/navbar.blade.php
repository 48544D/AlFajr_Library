<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

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
    </div>
    <hr>
    <div class="bottom-section">
        <ul class="ul-container">
            <li>
                <a href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            @foreach ($categories as $category)
                <li class="has-dropdown">
                    <a href="" class="category-name"> {{ $category->name }} </a>
                    <ul class="dropdown">
                        @foreach($category->subCategories as $subCategory)
                            <li class="subcategory"><a href="">{{ $subCategory->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            {{-- <li class="has-dropdown">
                <a href="">SCOLAIRE</a>
                <ul class="dropdown">
                    <li><a href="#">Sub-item 1</a></li>
                    <li><a href="#">Sub-item 2</a></li>
                    <li><a href="#">Sub-item 3</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="">BUREAUTIQUE</a>
                <ul class="dropdown">
                    <li><a href="#">Sub-item 1</a></li>
                    <li><a href="#">Sub-item 2</a></li>
                    <li><a href="#">Sub-item 3</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="">DESSIN</a>
                <ul class="dropdown">
                    <li><a href="#">Sub-item 1</a></li>
                    <li><a href="#">Sub-item 2</a></li>
                    <li><a href="#">Sub-item 3</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="">PROMOTIONS</a>
                <ul class="dropdown">
                    <li><a href="#">Sub-item 1</a></li>
                    <li><a href="#">Sub-item 2</a></li>
                    <li><a href="#">Sub-item 3</a></li>
                </ul>
            </li> --}}
            <li>
                <a href="{{ route('maliste.index') }}">MA LISTE</a>
            </li>
        </ul>
    </div>
</header>