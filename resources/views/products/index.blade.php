@extends('layouts.app')

@section('title', 'All products')

@section('content')
    <ul>
    @forelse ($products as $product)
        <li>
            <x-product-card :name="$product->getName()" :price="$product->getPrice()" :id="$product->getId()" />
        </li>
    @empty
        <li>No products available</li>
    @endforelse
    </ul>
@endsection