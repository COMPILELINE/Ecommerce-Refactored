
# CI4 E-Commerce (Basic Functional, DDD)

## Quickstart
```bash
composer install
cp .env.example .env
php spark key:generate
php spark migrate --all
php spark db:seed UserSeeder
php spark db:seed ProductSeeder
php spark serve
```
Open http://localhost:8080
