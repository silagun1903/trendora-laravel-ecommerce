<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | Trendora</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora</div>

    <nav class="navbar">
        <a href="/">Home</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="/#categories">Categories</a>
        <a href="{{ route('admin.products.index') }}">Admin Panel</a>
    </nav>

    <div class="header-actions">
        <a href="{{ route('cart.index') }}" class="cart-link">Cart</a>
    </div>
</header>

<section class="product-detail">
    <div class="detail-image">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
    </div>

    <div class="detail-info">
        <span class="detail-category">{{ $product->category }}</span>

        <h1>{{ $product->name }}</h1>

        <p class="detail-price">
            ${{ number_format($product->price, 2) }}
        </p>

        <p class="detail-description">
            {{ $product->description }}
        </p>

        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="detail-cart-form">
    @csrf
    <button type="submit" class="detail-cart-btn">Add to Cart</button>
</form>
        <a href="/" class="back-btn">Back to Home</a>
    </div>
</section>

</body>
</html>