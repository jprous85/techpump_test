<?php

declare(strict_types=1);


namespace Src\Cart\Domain\CartItem\Repositories;


use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;

interface CartItemRepository
{
    public function getCartItemByCartUuid(CartItemCartUuidVO $cartItemCartUuidVO): array;

    public function getCartItemByProduct(CartItemProductUuidVO $cartItemProductUuid): ?CartItem;

    public function includeProductOfCartItem(CartItem $cartItem): void;

    public function updateAmountProductOfCartItem(CartItem $cartItem): void;

    public function deleteProductOfCartItem(CartItem $cartItem): void;

}
