<?php

declare(strict_types=1);

namespace Tests\Cart\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Cart\Infrastructure\Request\CartRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class CreateCartAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create_cart_and_return_200()
    {
        $cart_params = $this->createParams(CartRequestMother::class);

        $response = $this->httpAction(
            'post',
            'carts' .
            DIRECTORY_SEPARATOR .
            'create',
            $cart_params);

        /*$response->assertExactJson(
            ["code"    => 200,
             "status"  => "OK",
             "message" => "",
             "id"      => $response['id']
            ]);*/

        if ($response['code'] != 200) {
            dump($response);
        }

        $response->assertStatus(Response::HTTP_OK);

    }
}
