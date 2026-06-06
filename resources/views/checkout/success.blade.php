<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed | Trendora</title>

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

<section class="success-page">
    <div class="success-card">
        <div class="success-icon">✓</div>

        <h1>Order Completed Successfully!</h1>

        <p>
            Thank you for shopping with Trendora. Your order has been received.
        </p>

        <h2>Total Paid: ${{ number_format($total, 2) }}</h2>

        <a href="/" class="hero-btn">Back to Home</a>
    </div>
</section>

</body>
</html>
