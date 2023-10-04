<?php

declare(strict_types=1);

namespace Src\Cart\Infrastructure\Cart\Controllers;

use Src\Cart\Application\Request\ShowCartRequest;
use Src\Cart\Application\UseCases\ShowAllCart;
use Src\Cart\Application\UseCases\ShowCart;
use Symfony\Component\HttpFoundation\JsonResponse;
use function response;

final class CartGetController
{
    public function __construct(
        private ShowCart $show_cart,
        private ShowAllCart $show_all_cart
    ) {
    }

    public function show(string $uuid): JsonResponse
    {
        $request = new ShowCartRequest($uuid);
        return response()->json(($this->show_cart)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return response()->json(($this->show_all_cart)()->toArray());
    }
}
