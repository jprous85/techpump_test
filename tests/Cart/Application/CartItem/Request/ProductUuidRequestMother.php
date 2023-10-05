<?php

declare(strict_types=1);


namespace Tests\Cart\Application\CartItem\Request;


use Src\Cart\Application\CartItem\Request\ProductUuidRequest;
use Tests\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVOMother;

final class ProductUuidRequestMother
{

    public static function create(
        string $product_uuid
    ): ProductUuidRequest
    {
        return new ProductUuidRequest(
            $product_uuid
        );
    }

    public static function random(): ProductUuidRequest
    {
        $product_uuid = CartItemProductUuidVOMother::random()->value();

        return self::create(
            $product_uuid
        );
    }
}
