<?php

declare(strict_types=1);

namespace Tests\Cart\Domain\Cart\ValueObjects;

use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;
use Faker\Factory;


final class CartStatusVOMother
{
    /**
     * @throws \Exception
     */
    public static function create(string $value): CartStatusVO
    {
        return new CartStatusVO($value);
    }

    public static function random(): CartStatusVO
    {
        $faker = Factory::create();
        return self::create(($faker->boolean) ? 'DRAFT' : 'PROCESSED');
    }
}
