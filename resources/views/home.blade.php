<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendora | Online Shopping</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="top-header">
    <div class="logo">Trendora</div>

    <nav class="navbar">
    <a href="/">Home</a>
    <a href="{{ route('products.index') }}">Products</a>
    <a href="/#categories">Categories</a>
    <a href="/#contact">Contact</a>
    <a href="{{ route('admin.products.index') }}">Admin Panel</a>
    </nav>

    <div class="header-actions">
        <input type="text" placeholder="Search products...">
       <a href="{{ route('cart.index') }}" class="cart-link">Cart</a>
    </div>
</header>

<section class="hero">
    <div class="hero-text">
        <span>New Season</span>
        <h1>Discover Trending Products</h1>
        <p>Explore the latest fashion, technology and accessories with special offers.</p>
        <a href="#" class="hero-btn">Shop Now</a>
    </div>

    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8" alt="Shopping">
    </div>
</section>

<section class="categories" id="categories">
    <h2>Categories</h2>

   <div class="category-list">
    <a href="{{ route('products.index', ['category' => 'Accessories']) }}" class="category-card">
        Accessories
    </a>

    <a href="{{ route('products.index', ['category' => 'Shoes']) }}" class="category-card">
        Shoes
    </a>

    <a href="{{ route('products.index', ['category' => 'Electronics']) }}" class="category-card">
        Electronics
    </a>

    <a href="{{ route('products.index') }}" class="category-card">
        All Products
    </a>
</div>
</section>

<section class="products">
    <h2>Featured Products</h2>

    <div class="product-list">
    @foreach($products as $product)
        <div class="product-card">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p class="category-name">{{ $product->category }}</p>
            <p class="price">${{ number_format($product->price, 2) }}</p>
            <a href="{{ route('products.show', $product->id) }}" class="detail-btn">View Details</a>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit">Add to Cart</button>
</form>
        </div>
    @endforeach
</div>
</section>
<section class="contact-section" id="contact">
    <div class="contact-content">
        <div class="contact-info">
            <span>Contact Us</span>
            <h2>Get in Touch</h2>
            <p>
                Have a question about our products or your order? Send us a message and our team will contact you soon.
            </p>

            <div class="contact-details">
                <p><strong>Email:</strong> silagun18@gmail.com</p>
                <p><strong>Address:</strong> Istanbul, Türkiye</p>
            </div>
        </div>

        <form class="contact-form">
            <input type="text" placeholder="Your name">
            <input type="email" placeholder="Your email">
            <textarea placeholder="Your message"></textarea>
            <button type="button">Send Message</button>
        </form>
    </div>
</section>
<footer class="main-footer">
    <div class="footer-content">
        <div>
            <h3>Trendora</h3>
            <p>A modern Laravel e-commerce project.</p>
        </div>

        <div>
            <h4>Quick Links</h4>
            <a href="/">Home</a>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="/#categories">Categories</a>
        </div>

        <div>
            <h4>Project</h4>
            <a href="{{ route('cart.index') }}">Cart</a>
            <a href="{{ route('admin.products.index') }}">Admin Panel</a>
        </div>
    </div>

    <p class="footer-bottom">© 2026 Trendora. Developed with Laravel.</p>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>