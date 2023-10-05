<?php

declare(strict_types=1);


namespace Src\Cart\Infrastructure\CartItem\Persistence;


use Src\Cart\Domain\Cart\CartConstants;
use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;
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

    /**
     * @throws \Exception
     */
    public function getCartItemByProduct(CartItemProductUuidVO $cartItemProductUuid): ?CartItem
    {
        $query = $this->cartItem
            ->select('cart_items.*')
            ->join('carts', 'cart_items.cart_uuid', '=', 'carts.uuid')
            ->where('cart_items.product_uuid', $cartItemProductUuid->value())
            ->where('carts.status', CartConstants::DRAFT)
            ->first();

        return (new CartItemAdapter($query))->cartItemModelAdapter();
    }

    public function includeProductOfCartItem(CartItem $cartItem): void
    {
        $this->cartItem->create($cartItem->getPrimitives());
    }

    public function updateAmountProductOfCartItem(CartItem $cartItem): void
    {
        $update_cartItem = $this->cartItem
            ->select('cart_items.*')
            ->join('carts', 'cart_items.cart_uuid', '=', 'carts.uuid')
            ->where('cart_items.cart_uuid', $cartItem->getCartItemCartUuidVO()->value())
            ->where('cart_items.product_uuid', $cartItem->getCartItemProductUuidVO()->value())
            ->where('carts.status', CartConstants::DRAFT)
            ->first();
        $update_cartItem?->update($cartItem->getPrimitives());
    }

    public function deleteProductOfCartItem(CartItem $cartItem): void
    {
        $this->cartItem
            ->where('uuid', $cartItem->getCartItemUuidVO()->value())
            ->where('product_uuid', $cartItem->getCartItemProductUuidVO()->value())
            ->delete();
    }
}
