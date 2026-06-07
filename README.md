HATİCE SILA GÜN 20222022432

# Trendora - Laravel E-Commerce Project

Trendora is a Laravel-based e-commerce web application developed with PHP, MySQL, Blade, HTML, CSS, and JavaScript. The project includes product listing, product details, database-based shopping cart operations, checkout process, order creation, admin order management, contact section, admin product management, login/logout system, role management, and admin panel protection with middleware.

## Technologies Used

* Laravel
* PHP
* MySQL
* Blade Template Engine
* HTML
* CSS
* JavaScript
* XAMPP
* phpMyAdmin
* Git / GitHub

## Main Features

* Home page with product showcase
* Products page
* Product search by name
* Product filtering by category
* Product detail page
* Shopping cart system using MySQL database
* Add products to cart
* Increase and decrease product quantity in cart
* Remove products from cart
* Clear cart
* Checkout form with customer information
* Order creation system
* Order items stored in database
* Checkout success page with order number
* Admin order management
* Admin order list page
* Admin order detail page
* Order status update system
* Order filtering by status
* Contact section
* Admin product management panel
* Add product
* Edit product
* Show product detail in admin panel
* Delete product
* Laravel validation for admin product forms
* Products are stored and retrieved from MySQL database
* Role table for admin and user roles
* Pivot table for assigning roles to users
* Admin user seeder
* Default admin account creation
* Login and logout system
* Role middleware for admin panel protection
* Admin panel is accessible only by users with admin role

## Database

The project uses a MySQL database named:

```txt
trendora_db
```

## Main Tables

### products

The `products` table stores product information.

Fields:

* id
* name
* image
* price
* category
* description
* created_at
* updated_at

### users

The `users` table stores user information.

Fields:

* id
* name
* email
* password
* remember_token
* created_at
* updated_at

### roles

The `roles` table stores user role information.

Default roles:

* admin
* user

Fields:

* id
* name
* description
* created_at
* updated_at

### role_user

The `role_user` table is a pivot table. It connects users and roles with a many-to-many relationship.

Fields:

* id
* user_id
* role_id
* created_at
* updated_at

### carts

The `carts` table stores products added to the shopping cart by authenticated users.

Fields:

* id
* user_id
* product_id
* quantity
* price
* created_at
* updated_at

### orders

The `orders` table stores customer order information.

Fields:

* id
* user_id
* name
* email
* phone
* address
* city
* country
* zip_code
* subtotal
* shipping_price
* total
* shipping_method
* payment_method
* status
* created_at
* updated_at

### order_items

The `order_items` table stores products inside each order.

Fields:

* id
* order_id
* product_id
* product_name
* price
* quantity
* total
* created_at
* updated_at

## Default Admin Account

The project includes a default admin user created by seeder.

```txt
Email: admin@trendora.com
Password: 12345678
```

This account has both `admin` and `user` roles.

## Installation Steps

1. Clone or download the project.

2. Open the project folder in terminal.

3. Install Composer dependencies:

```bash
composer install
```

4. Create a database named `trendora_db` in phpMyAdmin.

5. Update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=trendora_db
DB_USERNAME=root
DB_PASSWORD=
```

6. Run migrations:

```bash
php artisan migrate
```

7. Run seeders:

```bash
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=AdminUserSeeder
```

8. Start the Laravel development server:

```bash
php artisan serve
```

9. Open the project in browser:

```txt
http://127.0.0.1:8000
```

## Main Pages

### Home Page

```txt
http://127.0.0.1:8000
```

The home page displays featured products, categories, contact section, and navigation links.

### Products Page

```txt
http://127.0.0.1:8000/products
```

The products page displays all products. Users can search products by name and filter products by category.

### Product Detail Page

```txt
http://127.0.0.1:8000/products/{id}
```

The product detail page displays detailed information about a selected product.

### Cart Page

```txt
http://127.0.0.1:8000/cart
```

The cart page displays products added to the cart. The cart system stores cart records in the MySQL database. Users can increase or decrease product quantity, remove products, clear the cart, and continue to checkout.

### Checkout Page

```txt
http://127.0.0.1:8000/checkout
```

The checkout page collects customer billing information, shipping method, and payment method. After placing an order, order information is saved into the `orders` and `order_items` tables.

### Login Page

```txt
http://127.0.0.1:8000/login
```

The login page allows the admin user to log in.

### Admin Products Panel

```txt
http://127.0.0.1:8000/admin/products
```

The admin products panel allows product management operations such as adding, editing, showing, and deleting products.

### Admin Orders Panel

```txt
http://127.0.0.1:8000/admin/orders
```

The admin orders panel allows the admin user to list orders, filter orders by status, view order details, and update order status.

## Admin Panel Features

* List all products
* Add new product
* Edit existing product
* Show product detail
* Delete product
* Validate product form inputs
* List all orders
* Filter orders by status
* Show order detail
* Show customer information
* Show order items
* Update order status
* Protect admin routes with role middleware

## Authentication and Authorization

The project includes a custom login and logout system using Laravel Auth.

Role-based authorization is implemented with a custom `RoleMiddleware`.

Access rules:

* Guests can view home, products, product details, and login page.
* Guests cannot access the cart page.
* Guests cannot add products to the cart.
* Guests cannot access the admin panel.
* Authenticated users can use the cart and checkout system.
* Logged-in users without admin role cannot access the admin panel.
* Users with admin role can access product management and order management panels.

## Shopping Cart System

The shopping cart system is connected to the MySQL database.

Cart operations:

* Add product to cart
* Increase product quantity
* Decrease product quantity
* Remove product from cart
* Clear cart
* View cart total

Each cart item is connected to:

* authenticated user
* product
* quantity
* price

## Order System

The order system stores completed checkout information in the database.

Order process:

1. User adds products to cart.
2. User opens checkout page.
3. User enters billing and address information.
4. User selects shipping and payment method.
5. System creates an order record.
6. System creates order item records.
7. Cart records are cleared after successful order.
8. User sees order success page with order number and total price.

## Admin Order Management

Admin users can manage orders from the admin panel.

Admin order features:

* View all orders
* Filter orders by status
* View order details
* View customer information
* View ordered products
* Update order status

Available order statuses:

* New
* Accepted
* Cancelled
* Onshipping
* Completed

## Laravel MVC Structure

The project follows Laravel MVC structure:

* Routes are defined in `routes/web.php`
* Models are located in `app/Models`
* Controllers are located in `app/Http/Controllers`
* Admin controllers are located in `app/Http/Controllers/Admin`
* Middleware files are located in `app/Http/Middleware`
* Blade view files are located in `resources/views`
* CSS and JavaScript files are located in `public`

## Important Files

### Models

* `app/Models/Product.php`
* `app/Models/User.php`
* `app/Models/Role.php`
* `app/Models/Cart.php`
* `app/Models/Order.php`
* `app/Models/OrderItem.php`

### Controllers

* `app/Http/Controllers/CartController.php`
* `app/Http/Controllers/OrderController.php`
* `app/Http/Controllers/AuthController.php`
* `app/Http/Controllers/Admin/ProductController.php`
* `app/Http/Controllers/Admin/OrderController.php`

### Middleware

* `app/Http/Middleware/RoleMiddleware.php`

### Views

* `resources/views/home.blade.php`
* `resources/views/login.blade.php`
* `resources/views/products/index.blade.php`
* `resources/views/products/show.blade.php`
* `resources/views/cart/index.blade.php`
* `resources/views/checkout/index.blade.php`
* `resources/views/checkout/success.blade.php`
* `resources/views/admin/products/index.blade.php`
* `resources/views/admin/products/create.blade.php`
* `resources/views/admin/products/edit.blade.php`
* `resources/views/admin/products/show.blade.php`
* `resources/views/admin/orders/index.blade.php`
* `resources/views/admin/orders/show.blade.php`

### Public Files

* `public/css/style.css`
* `public/js/main.js`

## GitHub Commit Progress

The project is developed step by step and pushed to GitHub with meaningful commit messages.

Example commit progress:

```txt
Add core e-commerce features with product CRUD, cart, checkout, and filters
Add roles and admin user seeders
Add login logout and protect admin panel with role middleware
Add database cart model and cart storage
Add order and order item checkout system
Add admin order management pages
```

## Project Purpose

The purpose of this project is to demonstrate the development of a Laravel e-commerce website using MVC structure. The project includes routing, database operations, Blade templates, form validation, database-based cart management, authentication, role-based authorization, middleware usage, order creation, admin product management, and admin order management.

## Developer

Developed as a Laravel e-commerce project.
