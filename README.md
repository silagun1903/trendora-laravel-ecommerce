# Trendora - Laravel E-Commerce Project

Trendora is a basic e-commerce web application developed with Laravel, PHP, Blade, CSS, JavaScript, and MySQL. The project allows users to browse products, view product details, add products to the cart, update cart quantities, and complete a simple checkout process.

## Technologies Used

* Laravel
* PHP
* MySQL
* Blade Template Engine
* HTML
* CSS
* JavaScript
* XAMPP / phpMyAdmin

## Main Features

* Home page with product showcase
* Products page with search and category filter
* Product detail page
* Shopping cart system using Laravel session
* Increase and decrease product quantity in cart
* Checkout success page
* Contact section
* Admin product management panel
* Add, edit, and delete products
* Laravel validation for admin product forms
* Products are stored and retrieved from MySQL database
* Role table for admin and user roles
* Pivot table for assigning roles to users
* Admin user seeder
* Default admin account creation
* Role-based admin login system is planned as the next development step

## Database

The project uses a MySQL database named:

```txt
trendora_db
```

Main table used in the project:

```txt
products
```

The products table includes:

* id
* name
* image
* price
* category
* description
* created_at
* updated_at

Additional tables added for role management:

* roles
* role_user
* users

Default roles:

* admin
* user

Default admin account:

```txt
Email: admin@trendora.com
Password: 12345678
```

This admin account will be used for the role-based login system in the next development step.

## Installation Steps

1. Clone or download the project.
2. Open the project folder in terminal.
3. Install dependencies:

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

7. Run the product seeder:

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

## Admin Panel

Admin panel URL:

```txt
http://127.0.0.1:8000/admin/products
```

The admin panel allows product management operations such as adding, editing, and deleting products.

## Project Purpose

The purpose of this project is to demonstrate the development of a simple e-commerce website using Laravel MVC structure. It includes database operations, routing, controller logic, Blade views, form validation, session-based cart management, and responsive user interface design.

## Developer

Developed as a Laravel e-commerce project.
