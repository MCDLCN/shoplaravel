@extends('layouts.app')

@section('content')
<h1>Edit product</h1>

<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id', $product->category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="name">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $product->name) }}"
            required
        >
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <div>
        <label for="price">Price</label>
        <input
            type="number"
            name="price"
            id="price"
            step="0.01"
            min="0"
            value="{{ old('price', $product->price) }}"
            required
        >
    </div>

    <div>
        <label for="stock">Stock</label>
        <input
            type="number"
            name="stock"
            id="stock"
            min="0"
            value="{{ old('stock', $product->stock) }}"
            required
        >
    </div>

    <div>
        <label>
            <input
                type="checkbox"
                name="active"
                value="1"
                @checked(old('active', $product->active))
            >
            Active
        </label>
    </div>

    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>
    <button type="submit">Update product</button>
</form>
@endsection