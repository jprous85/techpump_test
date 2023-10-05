<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\CartItem\ValueObjects;

use Faker\Factory;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCreatedAtVO;


final class CartItemCreatedAtVOMother
{
    public static function create(string  $value): CartItemCreatedAtVO
    {
        return new CartItemCreatedAtVO($value);
    }

    public static function random(): CartItemCreatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
