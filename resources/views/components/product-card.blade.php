<div style="border:1px solid #ddd; border-radius:12px; padding:16px;">
    <h3 style="margin:0 0 8px;">{{ $name }}</h3>
    <p style="margin:0 0 12px;">Price: {{ $price }}</p>

    <a href="{{ route('product.show', ['id' => $id]) }}">
        View details
    </a>
</div>