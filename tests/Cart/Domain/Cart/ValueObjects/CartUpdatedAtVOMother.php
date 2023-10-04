<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\Cart\ValueObjects;

use Src\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVO;
use Faker\Factory;


final class CartUpdatedAtVOMother
{
    public static function create(string  $value): CartUpdatedAtVO
    {
        return new CartUpdatedAtVO($value);
    }

    public static function random(): CartUpdatedAtVO
    {
        $faker = Factory::create();
        return self::create($faker->date);
    }
}
