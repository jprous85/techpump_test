<?php

declare(strict_types=1);


namespace Src\Cart\Infrastructure\CartItem\Persistence;


use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Infrastructure\CartItem\Adapter\CartItemAdapter;

final class CartItemMYSQLRepository implements CartItemRepository
{

    public function __construct(
        private CartItemORMModel $cartItem
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function getCartItemByCartUuid(CartItemCartUuidVO $cartItemCartUuidVO): array
    {
        $eloquent_cart_items = $this->cartItem->where('cart_uuid', $cartItemCartUuidVO->value())->get();

        $cartItems = [];

        foreach ($eloquent_cart_items as $eloquent_cart_item) {
            $cartItems[] = (new CartItemAdapter($eloquent_cart_item))->cartItemModelAdapter();
        }

        return $cartItems;
    }

    public function includeProductOfCartItem(CartItem $cartItem): void
    {
        $this->cartItem->create($cartItem->getPrimitives());
    }

    public function updateAmountProductOfCartItem(CartItem $cartItem): void
    {
        $update_cartItem = $this->cartItem->find($cartItem->getCartItemUuidVO()->value());
        $update_cartItem->update($cartItem->getPrimitives());
    }

    public function deleteProductOfCartItem(CartItem $cartItem): void
    {
        $this->cartItem
            ->where('uuid', $cartItem->getCartItemUuidVO()->value())
            ->andWere('product_uuid', $cartItem->getCartItemProductUuidVO()->value())
            ->delete();
    }
}
