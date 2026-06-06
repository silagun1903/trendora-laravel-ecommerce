<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', function () {
    $products = Product::all();

    return view('home', compact('products'));
})->name('home');

Route::get('/products', function (Request $request) {
    $query = Product::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $products = $query->get();
    $categories = Product::select('category')->distinct()->pluck('category');

    return view('products.index', compact('products', 'categories'));
})->name('products.index');

Route::get('/products/{product}', function (Product $product) {
    return view('products.show', compact('product'));
})->name('products.show');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');

    Route::get('/admin/products/{product}', [AdminProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});