<?php

declare(strict_types=1);

namespace Src\Cart\Infrastructure\Cart\Controllers;

use Illuminate\Support\Facades\Auth;
use Src\Cart\Application\Cart\Request\ShowCartRequest;
use Src\Cart\Application\Cart\Request\UserUuidCartRequest;
use Src\Cart\Application\Cart\UseCases\ShowAllCart;
use Src\Cart\Application\Cart\UseCases\ShowCart;
use Src\Cart\Application\Cart\UseCases\ShowCartWithItems;
use Symfony\Component\HttpFoundation\JsonResponse;
use function response;

final class CartGetController
{
    public function __construct(
        private ShowCart $show_cart,
        private ShowAllCart $show_all_cart,
        private ShowCartWithItems $showCartWithItems
    ) {
    }

    /**
     * @throws \Exception
     */
    public function show(string $uuid): JsonResponse
    {
        $request = new ShowCartRequest($uuid);
        return response()->json(($this->show_cart)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return response()->json(($this->show_all_cart)()->toArray());
    }

    /**
     * @throws \Exception
     */
    public function cart(): JsonResponse
    {
        $userUuid = Auth::user()->uuid;
        $request = new UserUuidCartRequest($userUuid);
        return response()->json(($this->showCartWithItems)($request));
    }
}
