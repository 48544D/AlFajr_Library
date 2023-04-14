<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/flash-message.css') }}">

@extends('index')

@section('content')
    @livewire('product-show', ['product' => $product], key('product-show-'. $product->id))
@endsection