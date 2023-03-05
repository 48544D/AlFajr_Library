@extends('index')

@section('content')
    <x-product-cards :products="$products" />
@endsection