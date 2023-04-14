<link rel="stylesheet" href="{{ asset('css/products-table.css') }}">
<link rel="stylesheet" href="{{ asset('css/flash-message.css') }}">

@extends('index')

@section('content')
    <x-carousel/>
    @livewire('product-table')
@endsection