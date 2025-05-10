<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureCommands();
        $this->configureModels();
        $this->configureUrl();
        $this->configureRateLimiters();
    }

    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction(),
        );
    }

    private function configureModels(): void
    {
        Model::shouldBeStrict();

        Model::unguard();
    }

    private function configureUrl(): void
    {
        if ($this->app->isLocal()) {
            return;
        }

        URL::forceScheme('https');
    }

    private function configureRateLimiters(): void
    {
        RateLimiter::for('contact', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });
    }
}
