<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Trendora</title>

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

<section class="checkout-page">
    <h1>Checkout</h1>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('place.order') }}" method="POST" class="checkout-layout">
        @csrf

        <div class="checkout-form-card">
            <h2>Billing Details</h2>

            <input type="text" name="name" placeholder="Full Name" value="{{ old('name', Auth::user()->name) }}" required>

            <input type="email" name="email" placeholder="Email Address" value="{{ old('email', Auth::user()->email) }}" required>

            <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">

            <textarea name="address" placeholder="Address" required>{{ old('address') }}</textarea>

            <input type="text" name="city" placeholder="City" value="{{ old('city') }}">

            <input type="text" name="country" placeholder="Country" value="{{ old('country') }}">

            <input type="text" name="zip_code" placeholder="Zip Code" value="{{ old('zip_code') }}">

            <h2>Shipping Method</h2>

            <label class="checkout-radio">
                <input type="radio" name="shipping_method" value="Free Shipping" checked>
                Free Shipping - $0.00
            </label>

            <label class="checkout-radio">
                <input type="radio" name="shipping_method" value="Standard Shipping">
                Standard Shipping - $4.00
            </label>

            <h2>Payment Method</h2>

            <label class="checkout-radio">
                <input type="radio" name="payment_method" value="Cash / Bank Transfer" checked>
                Cash / Bank Transfer
            </label>

            <label class="checkout-radio">
                <input type="radio" name="payment_method" value="Cash on Delivery">
                Cash on Delivery
            </label>
        </div>

        <div class="checkout-summary-card">
            <h2>Order Summary</h2>

            @foreach($cartItems as $item)
                <div class="checkout-item">
                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}">

                    <div>
                        <h3>{{ $item->product->name }}</h3>
                        <p>${{ number_format($item->price, 2) }} x {{ $item->quantity }}</p>
                        <strong>${{ number_format($item->price * $item->quantity, 2) }}</strong>
                    </div>
                </div>
            @endforeach

            <div class="checkout-totals">
                <p>
                    <span>Subtotal:</span>
                    <strong>${{ number_format($subtotal, 2) }}</strong>
                </p>

                <p>
                    <span>Shipping:</span>
                    <strong>${{ number_format($shippingPrice, 2) }}</strong>
                </p>

                <h3>
                    <span>Total:</span>
                    <strong>${{ number_format($total, 2) }}</strong>
                </h3>
            </div>

            <button type="submit" class="place-order-btn">Place Order</button>
        </div>
    </form>
</section>

</body>
</html>