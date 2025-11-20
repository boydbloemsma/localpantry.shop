# Local Pantry Shop

A Laravel-based marketplace for local artisans to create online stores and list their products.

## Running locally

Make sure docker and docker compose are installed.

Copy `.env.example` to `.env`

Run the app.

```sh
docker compose up
```

Install all dependencies.

```sh
docker compose exec php composer install
```

Migrate database and seed data.

```sh
docker compose exec php php artisan migrate --seed
```

Generate an app key.

```sh
docker compose exec php php artisan key:generate
```

## Deploying

For deploying to production we use [kamal](https://kamal-deploy.org/).

So run the following command to get the production environment values in your shell enviroment.

> This assumes you have a .env.production file.

```
export $(cat .env.production | grep -v '^#' | xargs)
```

Deployment is then as easy as running the following.

```sh
kamal deploy
```

## How it works

- Users create stores with custom subdomains (e.g., `your-store.localpantry.shop`)
- Store owners manage products through the dashboard
- Customers browse and view products on individual storefronts
- Admin panel available at `/admin`

## Built with

- Laravel 12.x
- Filament 3.x (Admin Panel)
- TailwindCSS + Alpine.js
- Cloudflare Images
