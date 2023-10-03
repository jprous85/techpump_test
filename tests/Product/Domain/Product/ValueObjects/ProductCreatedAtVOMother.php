<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductCreatedAtVO;
use Faker\Factory;


final class ProductCreatedAtVOMother
{
    public static function create(string  $value): ProductCreatedAtVO
    {
        return new ProductCreatedAtVO($value);
    }

    public static function random(): ProductCreatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
