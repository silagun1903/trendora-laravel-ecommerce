<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Trendora</title>

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

<section class="cart-page">
    <h1>Your Shopping Cart</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="cart-list">
            @foreach($cart as $id => $item)
                <div class="cart-item">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">

                    <div class="cart-info">
                        <h3>{{ $item['name'] }}</h3>
                        <p>Price: ${{ number_format($item['price'], 2) }}</p>
<div class="quantity-control">
    <span>Quantity:</span>

    <form action="{{ route('cart.decrease', $id) }}" method="POST">
        @csrf
        <button type="submit">-</button>
    </form>

    <strong>{{ $item['quantity'] }}</strong>

    <form action="{{ route('cart.increase', $id) }}" method="POST">
        @csrf
        <button type="submit">+</button>
    </form>
</div>
                        <p class="cart-subtotal">
                            Subtotal: ${{ number_format($item['price'] * $item['quantity'], 2) }}
                        </p>
                    </div>

                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="remove-btn">Remove</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="cart-total">
            <h2>Total: ${{ number_format($total, 2) }}</h2>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="clear-btn">Clear Cart</button>
            </form>
            <form action="{{ route('checkout') }}" method="POST">
    @csrf
    <button type="submit" class="checkout-btn">Checkout</button>
</form>
        </div>
    @else
        <div class="empty-cart">
            <h2>Your cart is empty.</h2>
            <a href="/" class="hero-btn">Continue Shopping</a>
        </div>
    @endif
</section>

</body>
</html>