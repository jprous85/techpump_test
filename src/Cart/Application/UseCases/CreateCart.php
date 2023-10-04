<?php

declare(strict_types = 1);

namespace Src\Cart\Application\UseCases;

use Src\Cart\Application\Request\CreateCartRequest;
use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\Cart\Repositories\CartRepository;


use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;


final class CreateCart
{

    public function __construct(private CartRepository $repository)
    {
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CreateCartRequest $request): void
    {
        $cart = self::mapper($request);
        $this->repository->save($cart);
    }

    /**
     * @throws \Exception
     */
    private function mapper(CreateCartRequest $request): Cart
    {
        return Cart::create(
			new CartUuidVO($request->getUuid()),
			new CartUserUuidVO($request->getUserUuid()),
			new CartStatusVO($request->getStatus())
        );
    }
}
