<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;
use Faker\Factory;


final class ProductUuidVOMother
{
    public static function create(string  $value): ProductUuidVO
    {
        return new ProductUuidVO($value);
    }

    public static function random(): ProductUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
