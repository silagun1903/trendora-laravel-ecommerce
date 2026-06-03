<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product | Trendora</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora Admin</div>

    <nav class="navbar">
        <a href="/">Store</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('admin.products.create') }}">Add Product</a>
    </nav>
</header>

<section class="admin-page">
    <div class="admin-show-card">
        <div class="admin-show-image">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>

        <div class="admin-show-info">
            <span class="detail-category">{{ $product->category }}</span>

            <h1>{{ $product->name }}</h1>

            <p class="detail-price">
                ${{ number_format($product->price, 2) }}
            </p>

            <p class="detail-description">
                {{ $product->description }}
            </p>

            <div class="admin-show-actions">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="edit-btn">
                    Edit Product
                </a>

                <a href="{{ route('admin.products.index') }}" class="back-btn">
                    Back to Products
                </a>
            </div>
        </div>
    </div>
</section>

</body>
</html>