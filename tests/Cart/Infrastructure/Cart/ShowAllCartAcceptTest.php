<?php

declare(strict_types=1);

namespace Tests\Cart\Infrastructure\Cart;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAllCartAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all_cart_and_return_200()
    {
        $response = $this->httpAction(
            'get',
            'carts' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
