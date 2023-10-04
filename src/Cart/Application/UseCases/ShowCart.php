<?php

declare(strict_types = 1);

namespace Src\Cart\Application\UseCases;

use Exception;
use Src\Cart\Application\Request\ShowCartRequest;
use Src\Cart\Application\Response\CartResponse;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;


final class ShowCart
{
    public function __construct(private CartRepository $repository)
    {}

    /**
     * @throws Exception
     */
    public function __invoke(ShowCartRequest $id): CartResponse
    {
        $cartID = new CartUuidVO($id->getUuid());
        $cart = $this->repository->show($cartID);

        if (!$cart)
        {
            throw new Exception($cartID->value());
        }

        return CartResponse::SelfCartResponse($cart);
    }
}
