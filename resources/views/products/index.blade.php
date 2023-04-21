<link rel="stylesheet" href="{{ asset('css/products-table.css') }}">
<link rel="stylesheet" href="{{ asset('css/flash-message.css') }}">

@extends('index')

@section('content')
    {{-- check if the url has key search --}}
    @if (!request()->has('search'))
        <x-carousel/>
    @endif
    @livewire('product-table')
@endsection