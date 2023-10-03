<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductReferenceVO;
use Faker\Factory;


final class ProductReferenceVOMother
{
    public static function create(string  $value): ProductReferenceVO
    {
        return new ProductReferenceVO($value);
    }

    public static function random(): ProductReferenceVO
    {
        $faker = Factory::create();
        return self::create($faker->name . '-#' . $faker->uuid);
    }
}
