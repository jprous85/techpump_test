<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\CartItem\ValueObjects;

use Faker\Factory;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUpdatedAtVO;


final class CartItemUpdatedAtVOMother
{
    public static function create(string  $value): CartItemUpdatedAtVO
    {
        return new CartItemUpdatedAtVO($value);
    }

    public static function random(): CartItemUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
