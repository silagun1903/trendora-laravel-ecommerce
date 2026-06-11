<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category - Trendora</title>
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
    <h1>Edit Category</h1>

    <div class="admin-form-wrapper">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="admin-form">
            @csrf
            @method('PUT')

            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Enter category name">

            @error('name')
                <small class="error-text">{{ $message }}</small>
            @enderror

            <button type="submit" class="submit-btn">
                Update Category
            </button>

            <a href="{{ route('admin.categories.index') }}" class="back-btn">
                Back to Categories
            </a>
        </form>
    </div>
</section>

</body>
</html>