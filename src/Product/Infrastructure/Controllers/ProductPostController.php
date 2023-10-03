<?php

declare(strict_types = 1);

namespace Src\Product\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Product\Application\Request\CreateProductRequest;
use Src\Product\Application\UseCases\CreateProduct;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ProductPostController
{
    public function __construct(private CreateProduct $create)
    {}

    /**
     * @throws \Exception
     */
    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return response()->json('product created');
    }

    private function mapper(Request $request): CreateProductRequest
    {
        return new CreateProductRequest(
			$request->get('uuid'),
			$request->get('reference'),
			$request->get('name'),
			$request->get('description'),
			(float) $request->get('price'),
            (int) $request->get('amount'),
			$request->get('available'),
            (int) $request->get('active')
        );
    }
}
