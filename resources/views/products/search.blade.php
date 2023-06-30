@extends('index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products-table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flash-message.css') }}">
@endsection

@section('content')
    @livewire('search')
@endsection