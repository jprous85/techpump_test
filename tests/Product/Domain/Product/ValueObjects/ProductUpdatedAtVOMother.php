<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductUpdatedAtVO;
use Faker\Factory;


final class ProductUpdatedAtVOMother
{
    public static function create(string  $value): ProductUpdatedAtVO
    {
        return new ProductUpdatedAtVO($value);
    }

    public static function random(): ProductUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
