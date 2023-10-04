<?php

declare(strict_types=1);

namespace Tests\Cart\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Cart\Infrastructure\Request\CartRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class DeleteCartAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_delete_cart_and_return_200()
    {
        $cart_params = $this->createParams(CartRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'carts' .
            DIRECTORY_SEPARATOR .
            'create',
            $cart_params);

        $response = $this->httpAction(
            'delete',
            'carts' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'delete');

        /*
         * $response->assertExactJson(
            ["code"    => 200,
             "status"  => "OK",
             "message" => "",
             "id"      => $response_created['id']
            ]);
         * */

        $response->assertStatus(Response::HTTP_OK);
    }
}
