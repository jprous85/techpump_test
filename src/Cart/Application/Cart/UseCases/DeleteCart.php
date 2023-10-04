<?php

declare(strict_types = 1);

namespace Src\Cart\Application\Cart\UseCases;

use Src\Cart\Application\Cart\Request\DeleteCartRequest;
use Src\Cart\Application\Cart\Request\ShowCartRequest;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;


final class DeleteCart
{
    private ShowCart $show__cart;

    public function __construct(private CartRepository $repository)
    {
        $this->show__cart = new ShowCart($this->repository);
    }

    public function __invoke(DeleteCartRequest $request)
    {
        $response = ($this->show__cart)(new ShowCartRequest($request->getUuid()));

        $cart_id = new CartUuidVO($response->getUuid());
        $this->repository->delete($cart_id);
    }
}
