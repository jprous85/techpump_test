<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\CartItem\ValueObjects;

use Faker\Factory;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;


final class CartItemProductUuidVOMother
{
    public static function create(string  $value): CartItemProductUuidVO
    {
        return new CartItemProductUuidVO($value);
    }

    public static function random(): CartItemProductUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
