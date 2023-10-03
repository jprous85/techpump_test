<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductAmountVO;
use Faker\Factory;


final class ProductAmountVOMother
{
    public static function create(int  $value): ProductAmountVO
    {
        return new ProductAmountVO($value);
    }

    public static function random(): ProductAmountVO
    {
        $faker = Factory::create();
        return self::create($faker->randomDigitNotNull);
    }
}
