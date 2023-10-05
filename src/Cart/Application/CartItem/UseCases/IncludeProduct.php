<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\UseCases;


use Exception;
use Src\Cart\Application\CartItem\Request\CreateCartItemRequest;
use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemAmountVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUuidVO;
use Src\Product\Domain\Product\Repositories\ProductRepository;
use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;

final class IncludeProduct
{
    public function __construct(
        private ProductRepository $productRepository,
        private CartItemRepository $cartItemRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function __invoke(CreateCartItemRequest $createCartItemRequest): void
    {
        $product = $this->productRepository->show(
            new ProductUuidVO($createCartItemRequest->getProductUuid())
        );

        if (!$product) {
            throw new Exception('This product does not exist');
        }

        $cartItem = CartItem::create(
            new CartItemUuidVO($createCartItemRequest->getUuid()),
            new CartItemCartUuidVO($createCartItemRequest->getCartUuid()),
            new CartItemProductUuidVO($createCartItemRequest->getProductUuid()),
            new CartItemAmountVO($createCartItemRequest->getAmount())
        );

        $cartProduct = $this->cartItemRepository->getCartItemByProduct(
            new CartItemProductUuidVO($product->getUuid()->value())
        );

        if ($cartProduct) {

            if ($product->getAmount()->value() <= 0) {
                throw new Exception('There are not more products');
            }

            $cartItem->update(
                new CartItemProductUuidVO($createCartItemRequest->getProductUuid()),
                new CartItemAmountVO($createCartItemRequest->getAmount() + 1)
            );

            $this->cartItemRepository->updateAmountProductOfCartItem($cartItem);
        } else {
            $this->cartItemRepository->includeProductOfCartItem($cartItem);
        }

        $this->productRepository->update($product->reduceAmount());
    }
}
