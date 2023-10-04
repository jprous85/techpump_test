<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\Cart\ValueObjects;

use Src\Cart\Domain\Cart\ValueObjects\CartCreatedAtVO;
use Faker\Factory;


final class CartCreatedAtVOMother
{
    public static function create(string  $value): CartCreatedAtVO
    {
        return new CartCreatedAtVO($value);
    }

    public static function random(): CartCreatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
