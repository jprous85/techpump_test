<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\CartItem\ValueObjects;

use Faker\Factory;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUuidVO;


final class CartItemUuidVOMother
{
    public static function create(string  $value): CartItemUuidVO
    {
        return new CartItemUuidVO($value);
    }

    public static function random(): CartItemUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
