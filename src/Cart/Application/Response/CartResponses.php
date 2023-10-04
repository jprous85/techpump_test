<?php

declare(strict_types=1);

namespace Src\Cart\Application\Response;

final class CartResponses
{
    private array $cart_responses;

    public function __construct(CartResponse ...$cart_responses)
    {
        $this->cart_responses = $cart_responses;
    }

    public function getCart(): array
    {
        return $this->cart_responses;
    }

    public function toArray(): array
    {
        $cart_response_array = [];
        foreach ($this->cart_responses as $cart_response)
        {
            $cart_response_array[] = $cart_response->toArray();
        }
        return $cart_response_array;
    }
}
