<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StorefrontController;
use App\Http\Middleware\EnsureUserHasCompletedOnboarding;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.url'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/contact', [ContactController::class, 'create'])
        ->name('contact.create');

    Route::post('/contact', [ContactController::class, 'store'])
        ->middleware(['throttle:contact'])
        ->name('contact.store');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::prefix('/onboarding')->group(function () {
            Route::get('/', [OnboardingController::class, 'index'])
                ->name('onboarding.index');
            Route::post('/store', [OnboardingController::class, 'createStore'])
                ->name('onboarding.store');
            Route::post('/store/{store:slug}/product', [OnboardingController::class, 'createProduct'])
                ->name('onboarding.product');
        });

        Route::middleware([EnsureUserHasCompletedOnboarding::class])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::prefix('/stores')->group(function () {
                Route::get('/create', [StoreController::class, 'create'])
                    ->name('stores.create');
                Route::post('/', [StoreController::class, 'store'])
                    ->name('store.store');
                Route::get('/{store:slug}', [StoreController::class, 'show'])
                    ->name('stores.show');
                Route::delete('/{store:slug}', [StoreController::class, 'destroy'])
                    ->name('stores.destroy');

                Route::get('/{store:slug}/products/create', [ProductController::class, 'create'])
                    ->name('products.create');
                Route::post('/{store:slug}/products', [ProductController::class, 'store'])
                    ->name('products.store');
                Route::get('/{store:slug}/products/{product:slug}/edit', [ProductController::class, 'edit'])
                    ->name('products.edit');
                Route::patch('/{store:slug}/products/{product:slug}', [ProductController::class, 'update'])
                    ->name('products.update');
                Route::delete('/{store:slug}/products/{product:slug}', [ProductController::class, 'destroy'])
                    ->name('products.destroy');
            });

            Route::prefix('/profile')->group(function () {
                Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
                Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
            });
        });
    });

    require __DIR__.'/auth.php';
});

Route::domain('{store:slug}.' . parse_url(config('app.url'), PHP_URL_HOST))->group(function () {
    Route::get('/', [StoreFrontController::class, 'index'])
        ->name('storefront.index');

    Route::get('/products/{product:slug}', [StoreFrontController::class, 'show'])
        ->name('product.show');
});
