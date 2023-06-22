{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}

@if(backpack_user()->hasRole('admin'))
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="las la-home"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="las la-sort-amount-down"></i> Catégories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('sub-category') }}"><i class="las la-info"></i> Sous-catégories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="las la-shopping-cart"></i> Produits</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('promotions') }}"><i class="las la-book-open"></i> Promotions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="las la-bell"></i> Commandes</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mylists') }}"><i class="las la-list"></i> Ma Liste</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('client') }}"><i class="las la-user"></i> Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-users"></i> Utilisateurs</a></li>
<!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-details') }}"><i class="nav-icon la la-question"></i> Order details</a></li>-->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fas fa-folder"></i> Paramètres</a>
    <ul class="nav-dropdown-items">
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('control') }}"><i class="las la-cog"></i>Controls</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('carousel') }}"><i class="las la-image"></i> Carousels</a></li>
    </ul>
</li>


@else
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="las la-bell"></i> Commandes</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mylists') }}"><i class="las la-list"></i> Ma Liste</a></li>
@endif



