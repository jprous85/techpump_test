<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Infrastructure\Cart\Persistence\ORM\CartMYSQLRepository;
use Src\Cart\Infrastructure\CartItem\Persistence\CartItemMYSQLRepository;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartRepository::class, CartMYSQLRepository::class);
        $this->app->bind(CartItemRepository::class, CartItemMYSQLRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
