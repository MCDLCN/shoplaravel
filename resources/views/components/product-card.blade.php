<div style="border:1px solid #ddd; border-radius:12px; padding:16px;">
    <h3 style="margin:0 0 8px;">{{ $name }}</h3>
    <p style="margin:0 0 12px;">Price: {{ $price }}</p>

    <a href="{{ route('products.show', ['product' => $id]) }}">
        View details
    </a>
    <a href="{{ route('products.edit', ['product' =>$id]) }}">
        Edit product
    </a>
</div>