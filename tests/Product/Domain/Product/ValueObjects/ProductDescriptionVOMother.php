<?php

declare(strict_types=1);

namespace Tests\Product\Domain\Product\ValueObjects;

use Src\Product\Domain\Product\ValueObjects\ProductDescriptionVO;
use Faker\Factory;


final class ProductDescriptionVOMother
{
    public static function create(string  $value): ProductDescriptionVO
    {
        return new ProductDescriptionVO($value);
    }

    public static function random(): ProductDescriptionVO
    {
        $faker = Factory::create();
        return self::create($faker->text);
    }
}
