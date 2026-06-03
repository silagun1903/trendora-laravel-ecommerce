<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products | Trendora</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora Admin</div>

    <nav class="navbar">
        <a href="/">Store</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('admin.products.create') }}">Add Product</a>
    </nav>
</header>

<section class="admin-page">
    <div class="admin-header">
        <h1>Product Management</h1>
        <a href="{{ route('admin.products.create') }}" class="admin-add-btn">Add New Product</a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                        </td>

                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>

                     <td>
                         <a href="{{ route('admin.products.show', $product->id) }}" class="show-btn">
                            Show
                         </a>

                         <a href="{{ route('admin.products.edit', $product->id) }}" class="edit-btn">
                            Edit
                         </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')

                             <button type="submit" class="remove-btn">
                                 Delete
                             </button>
                        </form>
                     </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

</body>
</html>