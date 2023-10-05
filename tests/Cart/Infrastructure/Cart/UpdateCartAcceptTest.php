<?php

declare(strict_types=1);

namespace Tests\Cart\Infrastructure\Cart;

use Symfony\Component\HttpFoundation\Response;
use Tests\Cart\Infrastructure\Cart\Request\CartRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class UpdateCartAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_update_cart_and_return_200()
    {
        $cart_params = $this->createParams(CartRequestMother::class);

        $params = $this->createParams(CartRequestMother::class);
        unset($params['id']);

        $response_created = $this->httpAction(
            'post',
            'carts' .
            DIRECTORY_SEPARATOR .
            'create',
            $cart_params);

        $response = $this->httpAction(
            'put',
            'carts' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'update',
            $params);

        /*
         * $response->assertExactJson(
            ["code"    => 200,
             "status"  => "OK",
             "message" => "",
             "id"      => $response['id']
            ]);
         */

        $response->assertStatus(Response::HTTP_OK);
    }
}
