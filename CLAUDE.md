# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel-based multi-tenant local pantry marketplace where users can create stores and manage products. The application uses a subdomain-based storefront system where each store gets its own subdomain (e.g., `store-name.localpantry.shop`).

## Development Commands

### Starting Development Environment
```bash
composer dev
```
This starts the full development stack including Laravel server, queue worker, logs, and Vite frontend build.

### Individual Services
- **Laravel Server**: `php artisan serve`
- **Queue Worker**: `php artisan queue:listen --tries=1`
- **Logs**: `php artisan pail --timeout=0`
- **Frontend**: `npm run dev`

### Testing
```bash
composer test
```
This runs `php artisan config:clear` followed by `php artisan test`.

### Code Quality
- **Code Formatting**: `./vendor/bin/pint` (Laravel Pint)
- **Frontend Build**: `npm run build`

## Architecture Overview

### Multi-Domain Routing
The application uses Laravel's domain-based routing with two main domains:
- **Main Application**: `localpantry.shop` - handles authentication, dashboard, store management
- **Storefronts**: `{store-slug}.localpantry.shop` - individual store public pages

### Core Models & Relationships
- **User**: Can have multiple stores
- **Store**: Belongs to user, has many products, uses slug-based routing
- **Product**: Belongs to store, has image management via Cloudflare
- **ContactMessage**: Standalone model for contact form submissions

### Key Features
- **Onboarding Flow**: New users must complete store + product creation
- **Filament Admin Panel**: Located at `/admin` for administrative tasks
- **Image Management**: Cloudflare Images integration with automatic cleanup
- **Money Handling**: Uses `akaunting/laravel-money` with custom `MoneyCast`
- **Subdomain Resolution**: Store models resolve route bindings by slug
- **Rate Limiting**: Contact forms are rate-limited (3 per minute per IP)

### Technology Stack
- **Backend**: Laravel 12.x with PHP 8.4
- **Frontend**: Vite + TailwindCSS + Alpine.js
- **Admin**: Filament 3.x
- **Database**: SQLite (development), migrations include users, stores, products, contact_messages
- **External Services**: Cloudflare Images, Saloon HTTP client
- **Authentication**: Laravel Breeze

### File Structure Highlights
- **Actions**: Business logic in `app/Actions/` (Create/Update/Delete operations)
- **Integrations**: External API clients in `app/Http/Integrations/`
- **Policies**: Authorization in `app/Policies/`
- **Middleware**: Custom middleware including `EnsureUserHasCompletedOnboarding`
- **Casts**: Custom model casts in `app/Casts/`

### Security & Configuration
- **Strict Mode**: Models use strict mode and are unguarded
- **HTTPS**: Forced in production
- **Destructive Commands**: Prohibited in production
- **Super Admin**: Hardcoded gate for `boydbloemsma@gmail.com`

### Styling Guidelines
- **Design System**: Amber primary, rose secondary, stone backgrounds
- **Fonts**: Work Sans (sans), Playfair Display (serif)
- **TailwindCSS**: Configured for Laravel views and framework pagination