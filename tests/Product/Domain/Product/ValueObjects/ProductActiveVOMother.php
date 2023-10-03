<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductActiveVO;
use Faker\Factory;


final class ProductActiveVOMother
{
    public static function create(int  $value): ProductActiveVO
    {
        return new ProductActiveVO($value);
    }

    public static function random(): ProductActiveVO
    {
        $faker = Factory::create();
        return self::create((int) $faker->boolean);
    }
}
