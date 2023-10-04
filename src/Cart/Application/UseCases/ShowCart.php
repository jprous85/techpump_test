<?php

declare(strict_types = 1);

namespace Src\Cart\Application\UseCases;

use Src\Cart\Application\Request\ShowCartRequest;
use Src\Cart\Application\Response\CartResponse;
use Src\Cart\Domain\Cart\CartNotExist;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;


final class ShowCart
{
    public function __construct(private CartRepository $repository)
    {}

    public function __invoke(ShowCartRequest $id): CartResponse
    {
        $cartID = new CartUuidVO($id->getUuid());
        $cart = $this->repository->show($cartID);

        if (!$cart)
        {
            throw new CartNotExist($cartID->value());
        }

        return CartResponse::SelfCartResponse($cart);
    }
}
