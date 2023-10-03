<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductPriceVO;
use Faker\Factory;


final class ProductPriceVOMother
{
    public static function create(float  $value): ProductPriceVO
    {
        return new ProductPriceVO($value);
    }

    public static function random(): ProductPriceVO
    {
        $faker = Factory::create();
        return self::create($faker->randomFloat());
    }
}
