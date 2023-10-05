<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\CartItem\ValueObjects;

use Faker\Factory;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;


final class CartItemCartUuidVOMother
{
    public static function create(string  $value): CartItemCartUuidVO
    {
        return new CartItemCartUuidVO($value);
    }

    public static function random(): CartItemCartUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
