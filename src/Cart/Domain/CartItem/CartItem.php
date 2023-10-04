<?php

declare(strict_types=1);


namespace Src\Cart\Domain\CartItem;


use Carbon\Carbon;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemAmountVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCreatedAtVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUpdatedAtVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUuidVO;

final class CartItem
{
    public function __construct(
        private CartItemUuidVO        $cartItemUuidVO,
        private CartItemCartUuidVO    $cartItemCartUuidVO,
        private CartItemProductUuidVO $cartItemProductUuidVO,
        private CartItemAmountVO      $cartItemAmountVO,
        private CartItemCreatedAtVO   $cartItemCreatedAtVO,
        private CartItemUpdatedAtVO   $cartItemUpdatedAtVO
    )
    {
    }

    public static function create(
        CartItemUuidVO        $cartItemUuidVO,
        CartItemCartUuidVO    $cartItemCartUuidVO,
        CartItemProductUuidVO $cartItemProductUuidVO,
        CartItemAmountVO      $cartItemAmountVO,
    ): self
    {
        return new self(
            $cartItemUuidVO,
            $cartItemCartUuidVO,
            $cartItemProductUuidVO,
            $cartItemAmountVO,
            new CartItemCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
            new CartItemUpdatedAtVO(null)
        );
    }

    public function update(
        CartItemProductUuidVO $cartItemProductUuidVO,
        CartItemAmountVO      $cartItemAmountVO,
    ): void
    {
        $this->cartItemProductUuidVO = $cartItemProductUuidVO;
        $this->cartItemAmountVO      = $cartItemAmountVO;
        new CartItemUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

    /**
     * @return CartItemUuidVO
     */
    public function getCartItemUuidVO(): CartItemUuidVO
    {
        return $this->cartItemUuidVO;
    }

    /**
     * @return CartItemCartUuidVO
     */
    public function getCartItemCartUuidVO(): CartItemCartUuidVO
    {
        return $this->cartItemCartUuidVO;
    }

    /**
     * @return CartItemProductUuidVO
     */
    public function getCartItemProductUuidVO(): CartItemProductUuidVO
    {
        return $this->cartItemProductUuidVO;
    }

    /**
     * @return CartItemAmountVO
     */
    public function getCartItemAmountVO(): CartItemAmountVO
    {
        return $this->cartItemAmountVO;
    }

    /**
     * @return CartItemCreatedAtVO
     */
    public function getCartItemCreatedAtVO(): CartItemCreatedAtVO
    {
        return $this->cartItemCreatedAtVO;
    }

    /**
     * @return CartItemUpdatedAtVO
     */
    public function getCartItemUpdatedAtVO(): CartItemUpdatedAtVO
    {
        return $this->cartItemUpdatedAtVO;
    }

    public function getPrimitives()
    {
        return [
            'uuid' => $this->getCartItemUuidVO()->value(),
            'cart_uuid' => $this->getCartItemCartUuidVO()->value(),
            'product_uuid' => $this->getCartItemProductUuidVO()->value(),
            'amount' => $this->getCartItemAmountVO()->value(),
            'created_at' => $this->getCartItemCreatedAtVO()->value(),
            'updated_at' => $this->getCartItemUpdatedAtVO()->value()
        ];
    }
}
