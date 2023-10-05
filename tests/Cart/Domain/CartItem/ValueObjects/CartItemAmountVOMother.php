<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\CartItem\ValueObjects;

use Faker\Factory;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemAmountVO;


final class CartItemAmountVOMother
{
    /**
     * @throws \Exception
     */
    public static function create(int $value): CartItemAmountVO
    {
        return new CartItemAmountVO($value);
    }

    public static function random(): CartItemAmountVO
    {
        $faker = Factory::create();
        return self::create($faker->randomDigitNotNull);
    }
}
