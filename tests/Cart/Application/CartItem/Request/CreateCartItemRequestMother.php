<?php

declare(strict_types=1);


namespace Tests\Cart\Application\CartItem\Request;


use Src\Cart\Application\CartItem\Request\CreateCartItemRequest;
use Tests\Cart\Domain\CartItem\ValueObjects\CartItemAmountVOMother;
use Tests\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVOMother;
use Tests\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVOMother;
use Tests\Cart\Domain\CartItem\ValueObjects\CartItemUuidVOMother;

final class CreateCartItemRequestMother
{

    public static function create(
        string $uuid,
        string $cart_uuid,
        string $product_uuid,
        int    $amount
    ): CreateCartItemRequest
    {
        return new CreateCartItemRequest(
            $uuid,
            $cart_uuid,
            $product_uuid,
            $amount
        );
    }

    public static function random(): CreateCartItemRequest
    {

        $uuid         = CartItemUuidVOMother::random()->value();
        $cart_uuid    = CartItemCartUuidVOMother::random()->value();
        $product_uuid = CartItemProductUuidVOMother::random()->value();
        $amount       = CartItemAmountVOMother::random()->value();

        return self::create(
            $uuid,
            $cart_uuid,
            $product_uuid,
            $amount
        );
    }
}
