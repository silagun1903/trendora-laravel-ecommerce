<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail | Trendora Admin</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora Admin</div>

    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="/">Store</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('admin.products.create') }}">Add Product</a>
        <a href="{{ route('admin.orders.index') }}">Orders</a>
    </nav>

    <div class="header-actions">
        <span class="user-name">{{ Auth::user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</header>

<section class="admin-page">
    <div class="admin-header">
        <h1>Order Detail #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="admin-add-btn">Back to Orders</a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="order-detail-grid">
        <div class="order-info-card">
            <h2>Customer Information</h2>

            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone:</strong> {{ $order->phone ?? '-' }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>City:</strong> {{ $order->city ?? '-' }}</p>
            <p><strong>Country:</strong> {{ $order->country ?? '-' }}</p>
            <p><strong>Zip Code:</strong> {{ $order->zip_code ?? '-' }}</p>
        </div>

        <div class="order-info-card">
            <h2>Order Information</h2>

            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
            <p><strong>Current Status:</strong> {{ $order->status }}</p>
            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
            <p><strong>Shipping Method:</strong> {{ $order->shipping_method }}</p>
            <p><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
            <p><strong>Shipping:</strong> ${{ number_format($order->shipping_price, 2) }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="status-form">
                @csrf

                <label for="status">Change Status</label>

                <select name="status" id="status">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>

                <button type="submit">Update Status</button>
            </form>
        </div>
    </div>

    <div class="admin-table-wrapper order-items-table">
        <h2>Order Items</h2>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @forelse($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->total, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No order items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

</body>
</html>