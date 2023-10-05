<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\UseCases;


use Exception;
use Src\Cart\Application\Cart\Request\UserUuidCartRequest;
use Src\Cart\Application\CartItem\Request\ProductUuidRequest;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;

final class CartItemDeleteStrategy
{
    public function __construct(
        private DeleteProduct  $deleteProduct,
        private CartRepository $cartRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function __invoke(UserUuidCartRequest $userUuidCartRequest, ProductUuidRequest $productUuidRequest)
    {
        $cart = $this->cartRepository->getCartByUser(
            new CartUserUuidVO($userUuidCartRequest->getUserUuid())
        );

        if (!$cart) {
            throw new Exception('Does not exist the specific card form delete a product');
        }

        ($this->deleteProduct)($productUuidRequest);
    }
}
