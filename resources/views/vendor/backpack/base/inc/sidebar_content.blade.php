{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="las la-home"></i>{{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-question"></i> Catégories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('sub-category') }}"><i class="nav-icon la la-question"></i> Sous-catégories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-question"></i> Produits</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('promotions') }}"><i class="nav-icon la la-question"></i> Promotions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="nav-icon la la-question"></i> Commandes</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mylists') }}"><i class="nav-icon la la-question"></i> Ma Liste</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('clients') }}"><i class="nav-icon la la-question"></i> Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Utilisateurs</a></li>
<!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-details') }}"><i class="nav-icon la la-question"></i> Order details</a></li>-->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('control') }}"><i class="nav-icon la la-question"></i> Controls</a></li>
