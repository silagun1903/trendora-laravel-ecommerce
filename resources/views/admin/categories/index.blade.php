<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories - Trendora</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="admin-header-main">
    <div class="logo">Trendora Admin</div>

    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('home') }}">Store</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('admin.categories.index') }}">Categories</a>
        <a href="{{ route('admin.products.create') }}">Add Product</a>
        <a href="{{ route('admin.orders.index') }}">Orders</a>
    </nav>

    <div class="auth-area">
        <span>Admin User</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</header>

<section class="admin-page">
    <div class="admin-page-header">
        <h1>Category Management</h1>

        <a href="{{ route('admin.categories.create') }}" class="admin-add-btn">
            Add New Category
        </a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>#{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

</body>
</html>