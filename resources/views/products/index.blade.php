@extends('index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products-table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flash-message.css') }}">
@endsection

@section('content')
    {{-- check if the url has key search --}}
    @if (!request()->has('search'))
        <x-carousel/>
        <h1 class="text-center">Produits</h1>
    @endif
    @livewire('product-table')
@endsection