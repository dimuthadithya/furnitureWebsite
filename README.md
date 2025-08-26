# Furniture Website

This is a PHP-based e-commerce website for selling furniture. The project includes user authentication, product browsing, cart management, reviews, and an admin dashboard for managing products, categories, orders, and users.

## Features

- Home page with featured products
- Product details and reviews
- Shopping cart functionality
- User registration and login
- Admin panel for managing products, categories, orders, reviews, and users
- Contact and About pages

## Project Structure

```
about.php, cart.php, contact.php, featured.php, index.php, login.php, product-details.php, register.php, review.php
admin/         # Admin dashboard and handlers
assets/        # CSS, images, and documentation
config/        # Database configuration
includes/      # Reusable PHP components
sql/           # Database schema
```

## Setup Instructions

1. Clone the repository.
2. Import the database from `sql/furniture_db.sql` into your MySQL server.
3. Update database credentials in `config/db.php`.
4. Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP).
5. Access the site via your browser (e.g., `http://localhost/furniturewebsite`).

## Requirements

- PHP 7.x or higher
- MySQL
- Web server (Apache recommended)

## Admin Access

- Admin pages are located in the `admin/` directory.
- Only authenticated admin users can access these pages.

## License

This project is for educational purposes.
