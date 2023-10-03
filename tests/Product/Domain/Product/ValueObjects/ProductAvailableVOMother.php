<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductAvailableVO;
use Faker\Factory;


final class ProductAvailableVOMother
{
    public static function create(string  $value): ProductAvailableVO
    {
        return new ProductAvailableVO($value);
    }

    public static function random(): ProductAvailableVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
