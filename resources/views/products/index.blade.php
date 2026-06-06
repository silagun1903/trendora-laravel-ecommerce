<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Trendora</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora</div>

    <nav class="navbar">
        <a href="/">Home</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="/#categories">Categories</a>
        @auth
            @if(Auth::user()->hasRole('admin'))
                <a href="{{ route('admin.products.index') }}">Admin Panel</a>
            @endif
        @endauth
    </nav>

    <div class="header-actions">
        <a href="{{ route('cart.index') }}" class="cart-link">Cart</a>
    </div>
</header>

<section class="products-page">
    <h1>All Products</h1>

    <form action="{{ route('products.index') }}" method="GET" class="filter-form">
        <input 
            type="text" 
            name="search" 
            placeholder="Search products..." 
            value="{{ request('search') }}"
        >

        <select name="category">
            <option value="">All Categories</option>

            @foreach($categories as $category)
                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
        <a href="{{ route('products.index') }}" class="reset-btn">Reset</a>
    </form>

    <div class="product-list">
        @forelse($products as $product)
            <div class="product-card">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">

                <h3>{{ $product->name }}</h3>

                <p class="category-name">{{ $product->category }}</p>

                <p class="price">
                    ${{ number_format($product->price, 2) }}
                </p>

                <a href="{{ route('products.show', $product->id) }}" class="detail-btn">
                    View Details
                </a>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        @empty
            <div class="empty-cart">
                <h2>No products found.</h2>
                <a href="{{ route('products.index') }}" class="hero-btn">View All Products</a>
            </div>
        @endforelse
    </div>
</section>

</body>
</html>