<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\Cart\ValueObjects;

use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Faker\Factory;


final class CartUserUuidVOMother
{
    public static function create(string  $value): CartUserUuidVO
    {
        return new CartUserUuidVO($value);
    }

    public static function random(): CartUserUuidVO
    {
        $faker = Factory::create();
        return self::create($faker->uuid);
    }
}
