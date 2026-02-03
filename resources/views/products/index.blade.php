@extends('layouts.app')

@section('title', 'All products')

@section('content')
    <ul>
    @forelse ($products as $product)
        <li>
            <x-product-card :name="$product->name" :price="$product->price" :id="$product->id" />
        </li>
    @empty
        <li>No products available</li>
    @endforelse
    </ul>
@endsection