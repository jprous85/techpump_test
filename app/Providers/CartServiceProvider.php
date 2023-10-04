<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Infrastructure\Persistence\ORM\CartMYSQLRepository;

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
