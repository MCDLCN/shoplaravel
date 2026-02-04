@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('layouts.app')

@section('title', 'Creating product')

@section('content')
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="text" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div>
        <label for="price">Price</label>
        <input name="price" id="price" type="number" step="0.01" min="0" required>
    </div>

    <div>
        <label for="stock">Stock</label>
        <input name="stock" id="stock" type="number" min="0" required>
    </div>

    <div>
        <label for="image">Image</label>
        <input name="image" id="image" type="file" accept="image/*">
    </div>

    <div>
        <label>
            <input name="active" type="checkbox" value="1" checked>
            Active
        </label>
    </div>

    <button type="submit">Create product</button>
</form>
@endsection