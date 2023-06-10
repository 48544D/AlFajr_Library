{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="las la-home"></i>{{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="las la-book"></i></i> Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('sub-category') }}"><i class="las la-sort-amount-down"></i> Sub categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="las la-shopping-cart"></i> Products</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('promotions') }}"><i class="lab la-product-hunt"></i> Promotions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-users"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="las la-bell"></i> Orders</a></li>
<!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-details') }}"><i class="nav-icon la la-question"></i> Order details</a></li>-->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('order-details') }}"><i class="las la-sort"></i> Order details</a>
</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('clients') }}"><i class="las la-user-friends"></i> Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mylists') }}"><i class="las la-list"></i> Mylists</a></li>
<!-- a button for the carousel.update -->
<li class="nav-item"> <a class="nav-link" href="{{backpack_url('carousel')}}"><i class="las la-image"></i> Carousel</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('carousel-controller') }}"><i class="nav-icon la la-question"></i> Carousel controllers</a></li>