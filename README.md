HATİCE SILA GÜN 20222022432

# Trendora - Laravel E-Commerce Project

Trendora is a Laravel-based e-commerce web application developed with PHP, MySQL, Blade, HTML, CSS, and JavaScript. The project includes product listing, product details, shopping cart operations, checkout process, contact section, admin product management, login/logout system, role management, and admin panel protection with middleware.

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
* Shopping cart system using Laravel session
* Add products to cart
* Increase and decrease product quantity in cart
* Remove products from cart
* Clear cart
* Checkout success page
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

The cart page displays products added to the cart. Users can increase or decrease product quantity, remove products, clear the cart, and continue to checkout.

### Login Page

```txt
http://127.0.0.1:8000/login
```

The login page allows the admin user to log in.

### Admin Panel

```txt
http://127.0.0.1:8000/admin/products
```

The admin panel allows product management operations such as adding, editing, showing, and deleting products.

Admin panel access is protected with authentication and role middleware. Only users with the `admin` role can access the admin product management panel.

## Admin Panel Features

* List all products
* Add new product
* Edit existing product
* Show product detail
* Delete product
* Validate product form inputs
* Protect admin routes with role middleware

## Authentication and Authorization

The project includes a custom login and logout system using Laravel Auth.

Role-based authorization is implemented with a custom `RoleMiddleware`.

Access rules:

* Guests can view home, products, product details, cart, and login page.
* Guests cannot access the admin panel.
* Logged-in users without admin role cannot access the admin panel.
* Users with admin role can access the admin product management panel.

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

### Controllers

* `app/Http/Controllers/CartController.php`
* `app/Http/Controllers/AuthController.php`
* `app/Http/Controllers/Admin/ProductController.php`

### Middleware

* `app/Http/Middleware/RoleMiddleware.php`

### Views

* `resources/views/home.blade.php`
* `resources/views/login.blade.php`
* `resources/views/products/index.blade.php`
* `resources/views/products/show.blade.php`
* `resources/views/cart/index.blade.php`
* `resources/views/checkout/success.blade.php`
* `resources/views/admin/products/index.blade.php`
* `resources/views/admin/products/create.blade.php`
* `resources/views/admin/products/edit.blade.php`
* `resources/views/admin/products/show.blade.php`

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
```

## Planned Next Development

The next development step is to improve the shopping cart and order system with database tables.

Planned features:

* carts table
* orders table
* order_items table
* Cart model
* Order model
* OrderItem model
* OrderController
* Admin order management
* Order status update system
* Checkout form with customer information

## Project Purpose

The purpose of this project is to demonstrate the development of a Laravel e-commerce website using MVC structure. The project includes routing, database operations, Blade templates, form validation, session-based cart management, authentication, role-based authorization, middleware usage, and admin product management.

## Developer

Developed as a Laravel e-commerce project.
