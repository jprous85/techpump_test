<?php

declare(strict_types=1);

namespace Tests\Cart\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Cart\Infrastructure\Request\CartRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowCartAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_cart_and_return_200()
    {
        $cart_params = $this->createParams(CartRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'carts' .
            DIRECTORY_SEPARATOR .
            'create',
            $cart_params);

        $response = $this->httpAction(
            'get',
            'carts' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'show');

        $response->assertStatus(Response::HTTP_OK);
    }
}
