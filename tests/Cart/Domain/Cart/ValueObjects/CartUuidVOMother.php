<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\Cart\ValueObjects;

use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;
use Faker\Factory;


final class CartUuidVOMother
{
    public static function create(string  $value): CartUuidVO
    {
        return new CartUuidVO($value);
    }

    public static function random(): CartUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
