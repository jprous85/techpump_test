<?php

declare(strict_types=1);

namespace Tests\Product\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAllProductAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all_product_and_return_200()
    {
        $response = $this->httpAction(
            'get',
            'products' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
