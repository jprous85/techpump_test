<?php

namespace Src\Cart\Infrastructure\CartItem\Adapter;


use Exception;
use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\Repositories\CartItemAdapterRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemAmountVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCreatedAtVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUpdatedAtVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUuidVO;
use Src\Cart\Infrastructure\CartItem\Persistence\CartItemORMModel;

class CartItemAdapter implements CartItemAdapterRepository
{
    public function __construct(
        private ?CartItemORMModel $cartItem
    )
    {
    }

    private function getUuid(): string
    {
        return $this->cartItem['uuid'];
    }

    private function getCartUuid(): string
    {
        return $this->cartItem['cart_uuid'];
    }

    private function getProductUuid(): string
    {
        return $this->cartItem['product_uuid'];
    }

    private function getAmount(): int
    {
        return (int) $this->cartItem['amount'];
    }

    private function getCreatedAt(): string
    {
        return $this->cartItem['created_at'];
    }

    private function getUpdatedAt(): ?string
    {
        return $this->cartItem['updated_at'];
    }


    /**
     * @throws Exception
     */
    public function cartItemModelAdapter(): ?CartItem
    {
        if ($this->cartItem == null) {
            return null;
        }

        return new CartItem(
            new CartItemUuidVO($this->getUuid()),
            new CartItemCartUuidVO($this->getCartUuid()),
            new CartItemProductUuidVO($this->getProductUuid()),
            new CartItemAmountVO($this->getAmount()),
            new CartItemCreatedAtVO($this->getCreatedAt()),
            new CartItemUpdatedAtVO($this->getUpdatedAt()),
        );
    }

}
