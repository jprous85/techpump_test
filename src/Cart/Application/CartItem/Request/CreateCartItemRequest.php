<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\Request;


final class CreateCartItemRequest
{

    public function __construct(
        private readonly string $uuid,
        private readonly string $cart_uuid,
        private readonly string $product_uuid,
        private readonly int $amount
    )
    {
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getCartUuid(): string
    {
        return $this->cart_uuid;
    }

    /**
     * @return string
     */
    public function getProductUuid(): string
    {
        return $this->product_uuid;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
