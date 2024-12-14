<?php

namespace App\Providers;

use App\Repositories\ProductInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ShoppingCartInterface;
use App\Repositories\ShoppingCartRepository;
use App\Services\ProductService;
use App\Services\ShoppingCartService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ShoppingCartInterface::class, ShoppingCartRepository::class);
        $this->app->bind(ShoppingCartService::class, function ($app) {
            return new ShoppingCartService($app->make(ShoppingCartInterface::class));
        });

        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
