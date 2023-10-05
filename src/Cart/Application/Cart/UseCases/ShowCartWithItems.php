<?php

declare(strict_types=1);


namespace Src\Cart\Application\Cart\UseCases;


use Src\Cart\Application\Cart\Request\UserUuidCartRequest;
use Src\Cart\Application\Cart\Response\CartWithItemsResponse;
use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;

final class ShowCartWithItems
{
    public function __construct(
        private CartRepository $cartRepository,
        private CartItemRepository $cartItemRepository
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function __invoke(UserUuidCartRequest $request): CartWithItemsResponse
    {
        $cartUserUuidVO = new CartUserUuidVO($request->getUserUuid());
        $cart = $this->cartRepository->getCartByUser($cartUserUuidVO);

        if (!$cart) {
            throw new \Exception('Not has cart available');
        }

        $cartItems = $this->cartItemRepository->getCartItemByCartUuid(
            new CartItemCartUuidVO($cart->getUuid()->value())
        );

        return $this->map($cart, $cartItems);
    }

    private function map(Cart $cart, array $cartItems): CartWithItemsResponse
    {

        $cartItemsResponse = [];
        $totalItems = 0;
        foreach ($cartItems as $cartItem) {
            /**
             * @var CartItem $cartItem
             */
            $cartItemsResponse[] = $cartItem->getPrimitives();
            $totalItems += $cartItem->getCartItemAmountVO()->value();
        }

        return CartWithItemsResponse::SelfCartResponse($cart, $cartItemsResponse, $totalItems);
    }
}
