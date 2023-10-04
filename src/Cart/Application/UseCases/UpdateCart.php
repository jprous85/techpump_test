<?php

declare(strict_types=1);

namespace Src\Cart\Application\UseCases;

use Src\Cart\Application\Request\ShowCartRequest;
use Src\Cart\Application\Request\UpdateCartRequest;
use Src\Cart\Application\Response\CartResponse;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\Cart;

use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;


final class UpdateCart
{
    private ShowCart $show__cart;

    public function __construct(private CartRepository $repository)
    {
        $this->show__cart = new ShowCart($this->repository);
    }

    public function __invoke(string $uuid, UpdateCartRequest $request): void
    {
        $response = ($this->show__cart)(new ShowCartRequest($uuid));
        $cart     = CartResponse::responseToEntity($response);

        $cart = $this->mapper($cart, $request);
        $this->repository->update($cart);
    }

    private function mapper(Cart $cart, $request): Cart
    {
        $status = $request->getStatus() ? new CartStatusVO($request->getStatus()) : $cart->getStatus();

        $cart->update(
            $status,
        );

        return $cart;
    }
}
