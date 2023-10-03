<?php

declare(strict_types = 1);

namespace Src\Product\Application\UseCases;

use Src\Product\Application\Response\ProductResponse;
use Src\Product\Application\Response\ProductResponses;
use Src\Product\Domain\Product\Repositories\ProductRepository;

final class ShowAllProduct
{
    public function __construct(private ProductRepository $repository)
    {}

    public function __invoke(): ProductResponses
    {
        return new ProductResponses(...$this->map($this->repository->showAll()));
    }

    private function map($products): array
    {
        $product_array = [];
        foreach ($products as $product) {
            $product_array[] = ProductResponse::SelfProductResponse($product);
        }
        return $product_array;
    }
}
