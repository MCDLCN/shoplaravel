@extends('layouts.app')

@section('title', 'Your cart')

@section('content')
@if (!empty($cart))
    <h1>{{ count(value: $cart) }} products in your cart</h1>
    <ul>
    @foreach ($cart as $item)
        <li>
            <x-cart-item :item="$item" />
        </li>
    @endforeach
    </ul>
    for a total of {{ $total }}$
@else
    <h1>Empty aaa cart</h1>
@endif
@endsection