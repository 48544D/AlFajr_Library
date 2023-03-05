<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/navbar.css">

<nav>
    <div class="top-section">
        <div class="logo">
            <a href="">
                <img src="{{ asset('storage/images/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="search">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Recherecher">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="user">
            @if (Auth::check())
                <a href="">
                    <img src="{{ asset('images/user.png') }}" alt="user">
                </a>
            @else
                <a href="">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Connexion</span>
                </a>
            @endif
        </div>
        <div class="cart">
            <a href="">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Panier</span>
                <span>({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})</span>
            </a>
        </div>
    </div>
    <hr>
    <div class="bottom-section">
        <ul>
            <li>
                <a href=""><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            <li>
                <a href="">LIVRES</a>
            </li>
            <li>
                <a href="">SCOLAIRE</a>
            </li>
            <li>
                <a href="">BUREAUTIQUE</a>
            </li>
            <li>
                <a href="">DESSIN</a>
            </li>
            <li>
                <a href="">PROMOTIONS</a>
            </li>
            <li>
                <a href="">MA LISTE</a>
            </li>
        </ul>
    </div>
</nav>