<?php

declare(strict_types=1);

namespace Src\Product\Application\Response;

final class ProductResponses
{
    private array $product_responses;

    public function __construct(ProductResponse ...$product_responses)
    {
        $this->product_responses = $product_responses;
    }

    public function getProduct(): array
    {
        return $this->product_responses;
    }

    public function toArray(): array
    {
        $product_response_array = [];
        foreach ($this->product_responses as $product_response)
        {
            $product_response_array[] = $product_response->toArray();
        }
        return $product_response_array;
    }
}
