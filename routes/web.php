<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.url'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/stores/create', [StoreController::class, 'create'])
            ->name('stores.create');

        Route::get('/stores/{store:slug}', [StoreController::class, 'show'])
            ->name('stores.show');

        Route::post('/store', [StoreController::class, 'store'])
            ->name('store.store');

        Route::get('/products/create', [ProductController::class, 'create'])
            ->name('products.create');

        Route::post('/products', [ProductController::class, 'store'])
            ->name('products.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});

Route::domain('{store:slug}.' . parse_url(config('app.url'), PHP_URL_HOST))->group(function () {
    Route::get('/', [StoreFrontController::class, 'index'])
        ->name('storefront.index');

    Route::get('/products/{product:slug}', [StoreFrontController::class, 'show'])
        ->name('product.show');
});
