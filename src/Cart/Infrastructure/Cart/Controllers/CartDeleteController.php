<?php

declare(strict_types = 1);

namespace Src\Cart\Infrastructure\Cart\Controllers;

use Src\Cart\Application\Request\DeleteCartRequest;
use Src\Cart\Application\UseCases\DeleteCart;
use Symfony\Component\HttpFoundation\JsonResponse;
use function response;

final class CartDeleteController
{
    public function __construct(private DeleteCart $delete)
    {}

    public function delete(string $uuid): JsonResponse
    {
        $request = new DeleteCartRequest($uuid);
        ($this->delete)($request);
        return response()->json('Cart deleted');
    }
}
