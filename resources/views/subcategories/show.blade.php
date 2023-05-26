<link rel="stylesheet" href="{{ asset('css/products-table.css') }}">
<link rel="stylesheet" href="{{ asset('css/flash-message.css') }}">

@extends('index')

@section('content')
    @livewire('sub-categories.index', ['subCategory' => $subCategory], key('sub-categories-index-'. $subCategory->id))
@endsection