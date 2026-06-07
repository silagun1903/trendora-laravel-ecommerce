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
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="/#categories">Categories</a>
        <a href="/#contact">Contact</a>

        @auth
            @if(Auth::user()->hasRole('admin'))
                <a href="{{ route('admin.products.index') }}">Admin Panel</a>
            @endif
        @endauth
    </nav>

    <div class="header-actions">
        <a href="{{ route('cart.index') }}" class="cart-link">Cart</a>

        @auth
            <span class="user-name">{{ Auth::user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="cart-link">Login</a>
        @endauth
    </div>
</header>

<section class="cart-page">
    <h1>Your Shopping Cart</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->count() > 0)
        <div class="cart-list">
            @foreach($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}">

                    <div class="cart-info">
                        <h3>{{ $item->product->name }}</h3>

                        <p>Price: ${{ number_format($item->price, 2) }}</p>

                        <div class="quantity-control">
                            <span>Quantity:</span>

                            <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit">-</button>
                            </form>

                            <strong>{{ $item->quantity }}</strong>

                            <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit">+</button>
                            </form>
                        </div>

                        <p class="cart-subtotal">
                            Subtotal: ${{ number_format($item->price * $item->quantity, 2) }}
                        </p>
                    </div>

                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
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

            <a href="{{ route('checkout') }}" class="checkout-btn">Checkout</a>
        </div>
    @else
        <div class="empty-cart">
            <h2>Your cart is empty.</h2>
            <a href="{{ route('products.index') }}" class="hero-btn">Continue Shopping</a>
        </div>
    @endif
</section>

</body>
</html>