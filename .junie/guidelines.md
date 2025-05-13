# LocalPantry Developer Guidelines

## Project Overview
localpantry.shop is a platform that allows artisans to create online stores with custom subdomains (yourbrand.localpantry.shop). Users can sign up, create a store, add products, and manage their storefront.

## Tech Stack
- **Backend**: Laravel 12.0 (PHP 8.2+)
- **Admin Panel**: Filament 3.3
- **Frontend**: 
  - Blade templates
  - Tailwind CSS
  - Alpine.js
- **Build Tools**: Vite
- **Testing**: PestPHP
- **Money Handling**: Akaunting Laravel Money
- **API Integration**: Saloon
- **Authentication**: Laravel Breeze

## Project Structure
- **app/**
  - **Actions/**: Single-purpose action classes
  - **Casts/**: Custom Eloquent attribute casts
  - **Filament/**: Admin panel resources and components
  - **Http/**: Controllers, middleware, and requests
  - **Models/**: Eloquent models (User, Store, Product, ContactMessage)
  - **Policies/**: Authorization policies
  - **Providers/**: Service providers
  - **View/**: View-related components
- **config/**: Configuration files
- **database/**: Migrations, seeders, and factories
- **resources/**: Frontend assets, views, and language files
- **routes/**: Route definitions
- **tests/**: Feature and unit tests

## Development Setup
1. Clone the repository
2. Install PHP dependencies: `composer install`
3. Install JavaScript dependencies: `npm install`
4. Copy .env.example to .env: `cp .env.example .env`
5. Generate application key: `php artisan key:generate`
6. Set up your database in the .env file
7. Run migrations: `php artisan migrate`
8. Start the development server: `composer dev`

## Running Tests
```bash
# Run all tests
composer test

# Run specific test
php artisan test --filter=TestName
```

## Common Scripts
- **Start development environment**: `composer dev`
  - Runs Laravel server, queue worker, logs, and Vite concurrently
- **Build frontend assets**: `npm run build`
- **Run frontend dev server**: `npm run dev`

## Best Practices
1. **Code Organization**:
   - Use Actions for complex business logic
   - Keep controllers thin, delegating to actions when appropriate
   - Use policies for authorization
   - Don't create down methods in migrations

2. **Testing**:
   - Write feature tests for critical user flows
   - Write unit tests for complex business logic
   - Run tests before submitting pull requests

3. **Naming Conventions**:
   - Follow Laravel naming conventions
   - Use descriptive names for methods and variables
   - Use snake case for variables where possible
   - Use singular for model names, plural for controllers

4. **Multilingual Support**:
   - Use translation keys in views
   - Add new translations to language files in lang/

## Deployment
The application is configured for deployment with standard Laravel practices. Ensure all tests pass before deploying to production.
