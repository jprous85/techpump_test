<?php

declare(strict_types=1);

namespace Src\Product\Infrastructure\Controllers;

use Src\Product\Application\Request\ShowProductRequest;
use Src\Product\Application\UseCases\ShowAllProduct;
use Src\Product\Application\UseCases\ShowProduct;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ProductGetController
{
    public function __construct(
        private ShowProduct $show_product,
        private ShowAllProduct $show_all_product
    ) {
    }

    public function show(string $uuid): JsonResponse
    {
        $request = new ShowProductRequest($uuid);
        return response()->json(($this->show_product)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return response()->json(($this->show_all_product)()->toArray());
    }
}
