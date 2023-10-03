<?php

declare(strict_types = 1);

namespace Src\Product\Application\UseCases;

use Src\Product\Application\Request\ShowProductRequest;
use Src\Product\Application\Response\ProductResponse;
use Src\Product\Domain\Product\ProductNotExist;
use Src\Product\Domain\Product\Repositories\ProductRepository;
use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;


final class ShowProduct
{
    public function __construct(private ProductRepository $repository)
    {}

    public function __invoke(ShowProductRequest $id): ProductResponse
    {
        $productID = new ProductUuidVO($id->getUuid());
        $product = $this->repository->show($productID);

        if (!$product)
        {
            throw new ProductNotExist($productID->value());
        }

        return ProductResponse::SelfProductResponse($product);
    }
}
