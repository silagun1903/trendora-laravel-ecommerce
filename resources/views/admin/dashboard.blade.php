<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Trendora</title>

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
        <div>
            <h1>Admin Dashboard</h1>
            <p class="dashboard-subtitle">
                Welcome back, {{ Auth::user()->name }}. Here is a quick overview of Trendora.
            </p>
        </div>
    </div>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <h2>{{ $productCount }}</h2>
            <p>Total Products</p>
        </div>

        <div class="dashboard-card">
            <h2>{{ $orderCount }}</h2>
            <p>Total Orders</p>
        </div>

        <div class="dashboard-card">
            <h2>{{ $newOrderCount }}</h2>
            <p>New Orders</p>
        </div>
    </div>

    <div class="dashboard-actions">
        <a href="{{ route('admin.products.index') }}">Manage Products</a>
        <a href="{{ route('admin.orders.index') }}">Manage Orders</a>
        <a href="{{ route('admin.products.create') }}">Add New Product</a>
    </div>

    <div class="dashboard-panel">
        <div class="dashboard-panel-header">
            <h2>Recent Orders</h2>
            <a href="{{ route('admin.orders.index') }}">View All Orders</a>
        </div>

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($recentOrders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($order->status) }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>