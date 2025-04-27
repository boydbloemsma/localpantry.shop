<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $store->name }}</title>
</head>
<body>
<h1>{{ $store->name }}</h1>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    @foreach($products as $product)
        <div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 100%;">
            <h3>{{ $product->name }}</h3>
            <p>€{{ number_format($product->price, 2) }}</p>
            <a href="/products/{{ $product->slug }}">View</a>
        </div>
    @endforeach
</div>
</body>
</html>
