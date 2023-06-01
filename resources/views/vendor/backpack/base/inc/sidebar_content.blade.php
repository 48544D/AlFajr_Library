{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-question"></i> Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('sub-category') }}"><i class="nav-icon la la-question"></i> Sub categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-question"></i> Products</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="nav-icon la la-question"></i> Orders</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('clients') }}"><i class="nav-icon la la-question"></i> Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('promotions') }}"><i class="nav-icon la la-question"></i> Promotions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('mylists') }}"><i class="nav-icon la la-question"></i> Mylists</a></li>
<!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-details') }}"><i class="nav-icon la la-question"></i> Order details</a></li>-->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('order-details') }}"><i class="nav-icon la la-question"></i> Order details</a>
</li>

