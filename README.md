# 🛍️ ECommerce Refactored

A clean, modern, and scalable **E-Commerce Web Application** built with **CodeIgniter 4**.  
This project showcases a refactored architecture suitable for modern PHP development, maintainability, testability, and future growth.

---

## 🚀 Features

### ✅ Implemented in this Version
| Module | Status | Description |
|--------|--------|----------------|
| Product Catalog | ✅ | Browse products, product detail page |
| Cart | ✅ | Add, view, remove items |
| Checkout | ✅ | Place order (transactional), stock deduction |
| Authentication (API) | ✅ Basic | API login using AuthService |
| Database | ✅ | Migrations & seeders |
| Architecture | ✅ | DDD with Services + Repositories |
| Views/UI | ✅ | Minimal dark-theme UI included |

---

## 🧰 Tech Stack

| Layer | Technology |
|--------|----------------|
| Backend Framework | CodeIgniter 4 (v4.5+) |
| Language | PHP 8.1+ |
| Architecture | Domain-Driven Design (DDD) |
| Database | MySQL |
| Frontend | HTML, CSS (simple dark UI), CI4 Views |
| Auth | Session (basic), AuthService |
| Dev Tools | Composer, Migrations, Seeders |

---

## ⚙️ Installation & Setup

> Ensure PHP 8.1+, Composer, and MySQL are installed.

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/COMPILELINE/Ecommerce-Refactored.git
cd ecommerce-refactored
```
### 2️⃣ Install Dependencies
```bash
composer install
```
### 3️⃣ Environment Setup
```bash
cp .env.example .env
php spark key:generate
```
Update your .env DB settings:
```bash
database.default.database = ecommerce
database.default.username = YOUR_DB_USER
database.default.password = YOUR_DB_PASS
```
### 4️⃣ Run Migrations & Seeders
```bash
php spark migrate --all
php spark db:seed UserSeeder
php spark db:seed ProductSeeder
```
### 5️⃣ Start Local Server
```bash
php spark serve
```
open:
http://localhost:8080
