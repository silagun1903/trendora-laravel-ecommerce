<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Trendora Admin</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora Admin</div>

    <nav class="navbar">
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
        <h1>Order Management</h1>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.orders.index') }}" method="GET" class="filter-form">
        <select name="status">
            <option value="">All Orders</option>

            @foreach($statuses as $item)
                <option value="{{ $item }}" {{ $status == $item ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
        <a href="{{ route('admin.orders.index') }}" class="reset-btn">Reset</a>
    </form>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>

                        <td>
                            <span class="status-badge status-{{ strtolower($order->status) }}">
                                {{ $order->status }}
                            </span>
                        </td>

                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>

                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="show-btn">
                                Show
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

</body>
</html>