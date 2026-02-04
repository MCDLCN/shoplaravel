@extends('layouts.app')

@section('title', 'Category: {{ $category->name }}')

@section('content')
    <h1>{{ $category->name }}</h1>
    <h2>{{ $category->description }}</h2>
    <h3>There's {{ count($products) }} products in this category</h3>
    <br>
    <ul>
    @forelse ($products as $product)
        <li>
            <x-product-card :product="$product" />
        </li>
    @empty
        <li>No products in this category</li>
    @endforelse
    {{ $products->links() }}
@endsection