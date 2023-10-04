<?php

declare(strict_types = 1);

namespace Src\Cart\Application\Cart\UseCases;

use Src\Cart\Application\Cart\Response\CartResponse;
use Src\Cart\Application\Cart\Response\CartResponses;
use Src\Cart\Domain\Cart\Repositories\CartRepository;

final class ShowAllCart
{
    public function __construct(private CartRepository $repository)
    {}

    public function __invoke(): CartResponses
    {
        return new CartResponses(...$this->map($this->repository->showAll()));
    }

    private function map($carts): array
    {
        $cart_array = [];
        foreach ($carts as $cart) {
            $cart_array[] = CartResponse::SelfCartResponse($cart);
        }
        return $cart_array;
    }
}
