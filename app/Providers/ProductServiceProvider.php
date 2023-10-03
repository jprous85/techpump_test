<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Src\Product\Domain\Product\Repositories\ProductRepository;
use Src\Product\Infrastructure\Persistence\ORM\ProductMYSQLRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepository::class, ProductMYSQLRepository::class);
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
