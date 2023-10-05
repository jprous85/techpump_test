<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\UseCases;


use Exception;
use Src\Cart\Application\CartItem\Request\ProductUuidRequest;
use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemAmountVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;
use Src\Product\Domain\Product\Repositories\ProductRepository;
use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;

final class DeleteProduct
{
    public function __construct(
        private ProductRepository  $productRepository,
        private CartItemRepository $cartItemRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function __invoke(ProductUuidRequest $productUuidRequest): void
    {
        $product = $this->productRepository->show(
            new ProductUuidVO($productUuidRequest->getProductUuid())
        );

        if (!$product) {
            throw new Exception('This product does not exist');
        }

        $cartItem = $this->cartItemRepository->getCartItemByProduct(
            new CartItemProductUuidVO($product->getUuid()->value())
        );

        if (!$cartItem) {
            throw new Exception('Does not exist this element in this cart');
        }

        if (($cartItem->getCartItemAmountVO()->value() - 1) <= 0) {
            $this->cartItemRepository->deleteProductOfCartItem($cartItem);
        } else {
            $cartItem->update(
                new CartItemProductUuidVO($product->getUuid()->value()),
                new CartItemAmountVO($cartItem->getCartItemAmountVO()->value() - 1)
            );

            $this->cartItemRepository->updateAmountProductOfCartItem($cartItem);
        }

        $this->productRepository->update($product->increaseAmount());
    }
}
