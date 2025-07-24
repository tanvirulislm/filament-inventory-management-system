# 📦 Filament Inventory Management System

A modern, multi-tenant Inventory Management System built with the TALL stack and powered by the elegant **Filament** admin panel for Laravel. This system is designed to manage stock, purchases, customers, and providers efficiently for multiple organizations from a single codebase.

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel)
![Filament](https://img.shields.io/badge/Filament-3.x-F59E0B?style=for-the-badge&logo=filament)
![License](https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge)

---

## ✨ Key Features

-   🏢 **Multi-Tenant Architecture:** Each tenant (organization) has its own isolated data for products, customers, and sales, ensuring complete privacy and security.
-   📊 **Interactive Dashboard:** An overview of key metrics like total products, purchase value, and low-stock items.
-   ⚙️ **Tenant Settings:** Each organization can manage its own settings, such as company name, address, and logo.
-   🗂️ **Category Management:** Organize products into custom categories.
-   📦 **Product & Unit Management:** Full CRUD for products, including details like SKU, brand, and stock levels. Manage different product units (e.g., PCS, KG, Box).
-   👥 **Customer & Provider Management:** Keep a directory of all your customers and suppliers.
-   🛒 **Purchase Management:** Record and manage incoming stock by creating purchase orders from providers.
-   🔐 **Roles & Permissions:** Granular control over user access within each tenant (Admin, Manager, Staff).

---

## 🧰 Tech Stack

| Category        | Technology                                 |
| --------------- | ------------------------------------------ |
| **Backend**     | PHP 8.2+, Laravel 11                       |
| **Admin Panel** | Filament 3, Livewire 3, Alpine.js          |
| **Frontend**    | Tailwind CSS                               |
| **Database**    | MySQL / PostgreSQL                         |
| **Tenancy**     | `spatie/laravel-multitenancy` (or similar) |

---

## 🚀 Installation Guide

Follow these steps to get the project up and running on your local machine.

### 1. Clone the Repository

```bash
git clone [https://github.com/tanvirulislm/filament-inventory-management-system.git](https://github.com/your-username/filament-inventory-system.git)
cd filament-inventory-system
```

### 2. Install Dependencies

Install PHP dependencies using Composer.

```bash
composer install
```

### 3. Setup Environment File

Copy the example environment file and generate your application key.

```bash
cp .env.example .env
php artisan key:generate
```

Next, configure your database credentials (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD) in the .env file.

### 4. Run Migrations & Seed Data

Run the database migrations to create the necessary tables for landlords and tenants. The seeder will create a default admin user.

```bash
php artisan migrate --seed
```

### 5. Create an Admin User

If the seeder doesn't create a user, you can create one using this Filament command:

```bash
php artisan make:filament-user
```

Follow the prompts to set the name, email, and password for your admin account.

### 6. Run the Development Server

You're all set! Start the local development server.

```bash
php artisan serve
```

You can now access the application at http://127.0.0.1:8000.

### 🏢 Multi-Tenancy Implementation

This project uses a database-per-tenant approach. The landlord database manages tenants, while each tenant gets their own separate database for complete data isolation.

Tenant Registration: New organizations can be created through the admin panel or a public registration form.

Domain Management: Each tenant can be accessed via a unique subdomain (e.g., my-company.inventory.test).

Filament Integration: The Filament admin panel is configured to be tenancy-aware, automatically scoping all resources, pages, and widgets to the current tenant.

🖼️ Screenshots
(Add screenshots of your application here)

### Dashboard

#### Product Management

### 🤝 Contributing

Contributions are welcome! Please feel free to fork the repository, make changes, and submit a pull request. For major changes, please open an issue first to discuss what you would like to change.

### 📜 License

This project is open-source and licensed under the MIT License.
