<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Trendora</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora Admin</div>

    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="/">Store</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('admin.categories.index') }}">Categories</a>
        <a href="{{ route('admin.products.create') }}">Add Product</a>
        <a href="{{ route('admin.orders.index') }}">Orders</a>
    </nav>
</header>

<section class="admin-page">
    <div class="admin-form-card">
        <h1>Add New Product</h1>
        
    @if($errors->any())
    <div class="error-message">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <form action="{{ route('admin.products.store') }}" method="POST" class="admin-form">
            @csrf

            <input type="text" name="name" placeholder="Product name" required>

            <input type="text" name="image" placeholder="Image URL" required>

            <input type="number" step="0.01" name="price" placeholder="Price" required>

            <input type="text" name="category" placeholder="Category" required>

            <textarea name="description" placeholder="Product description"></textarea>

            <button type="submit">Save Product</button>
        </form>
    </div>
</section>

</body>
</html>