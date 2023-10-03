<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductNameVO;
use Faker\Factory;


final class ProductNameVOMother
{
    public static function create(string  $value): ProductNameVO
    {
        return new ProductNameVO($value);
    }

    public static function random(): ProductNameVO
    {
        $faker = Factory::create();
        return self::create($faker->name);
    }
}
