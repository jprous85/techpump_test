<?php

declare(strict_types = 1);

namespace Src\Product\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Product\Application\Request\UpdateProductRequest;
use Src\Product\Application\UseCases\UpdateProduct;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ProductPutController
{
    public function __construct(private UpdateProduct $update)
    {}

    public function update(string $uuid, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($uuid, $request);
        return response()->json('Product updated');
    }

    private function mapper(Request $request): UpdateProductRequest
    {
        return new UpdateProductRequest(
			$request->get('reference'),
			$request->get('name'),
			$request->get('description'),
			$request->get('price'),
			$request->get('amount'),
			$request->get('available'),
			$request->get('active')
        );
    }
}
