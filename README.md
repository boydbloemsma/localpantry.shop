# Local Pantry Shop

A Laravel-based marketplace for local artisans to create online stores and list their products.

## Quick Start

1. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

2. **Setup environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Run migrations:**
   ```bash
   php artisan migrate
   ```

4. **Start development:**
   ```bash
   composer dev
   ```

## How it works

- Users create stores with custom subdomains (e.g., `yourstore.localpantry.shop`)
- Store owners manage products through the dashboard
- Customers browse and view products on individual storefronts
- Admin panel available at `/admin`

## Built with

- Laravel 12.x
- Filament 3.x (Admin Panel)
- TailwindCSS + Alpine.js
- Cloudflare Images
