<?php

declare(strict_types = 1);

namespace Src\Product\Infrastructure\Controllers;

use Src\Product\Application\Request\DeleteProductRequest;
use Src\Product\Application\UseCases\DeleteProduct;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ProductDeleteController
{
    public function __construct(private DeleteProduct $delete)
    {}

    public function delete(string $uuid): JsonResponse
    {
        $request = new DeleteProductRequest($uuid);
        ($this->delete)($request);
        return response()->json('Product deleted');
    }
}
