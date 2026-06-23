# 🍕 Online Pizza Delivery System (Laravel)

A full-stack Online Pizza Delivery System developed using Laravel 8 and MySQL. The application allows customers to browse pizzas by category, manage their cart, place orders, and manage their profile. Administrators can manage pizzas, categories, users, orders, and system data through a dedicated admin dashboard.

---

## 🚀 Features

### Customer Module

* User Registration
* User Login & Logout
* Forgot Password Functionality
* Profile Management
* Browse Pizza Categories
* View Pizza Details
* Search Pizzas
* Add to Cart
* Manage Cart Items
* Place Orders
* View Order History

### Admin Module

* Admin Login
* Dashboard Overview
* Manage Categories
* Manage Pizzas
* Manage Users
* Manage Admins
* Manage Orders
* Update Order Status
* Soft Delete / Restore Records
* Permanent Delete Records
* Import Users via Excel
* Export Users to Excel

---

## 🛠️ Technology Stack

* Laravel 8
* MySQL
* Bootstrap
* HTML
* CSS
* JavaScript

---

## 📋 Prerequisites

Install the following before running the project:

* PHP 8.x
* Composer
* MySQL
* Node.js & npm (optional)

---

## ⚙️ Installation

### 1. Clone Repository

```bash
git clone https://github.com/FauziyaPirji/online-pizza-delivery-laravel.git
cd online-pizza-delivery-laravel
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
```

For Windows:

```bash
copy .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure Database

Open `.env`

Update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pizzawebsite
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Create Database

Create a MySQL database named:

```text
pizzawebsite
```

### 7. Run Migrations

```bash
php artisan migrate
```

### 8. Create Storage Link

This command is required for uploaded pizza images.

```bash
php artisan storage:link
```

### 9. Install Frontend Dependencies (Optional)

```bash
npm install
```

### 10. Start Development Server

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

## 📁 Important Commands

### Clear Cache

```bash
php artisan optimize:clear
```

### Clear Config Cache

```bash
php artisan config:clear
```

### Clear Route Cache

```bash
php artisan route:clear
```

### Clear View Cache

```bash
php artisan view:clear
```

### Recreate Storage Link

```bash
php artisan storage:link
```

---

## 📂 Project Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
vendor/

artisan
composer.json
package.json
webpack.mix.js
```

---

## 🔒 Security Notes

Do NOT upload:

```text
.env
vendor/
node_modules/
```

Make sure `.gitignore` contains:

```gitignore
/vendor
/node_modules
/.env
/public/storage
```

