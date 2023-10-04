<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\Request;


final class ProductUuidRequest
{
    public function __construct(private readonly string $productUuid)
    {
    }

    /**
     * @return string
     */
    public function getProductUuid(): string
    {
        return $this->productUuid;
    }
}
