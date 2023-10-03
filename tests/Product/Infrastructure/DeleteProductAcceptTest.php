<?php

declare(strict_types=1);

namespace Tests\Product\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Product\Infrastructure\Request\ProductRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class DeleteProductAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_delete_product_and_return_200()
    {
        $product_params = $this->createParams(ProductRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'products' .
            DIRECTORY_SEPARATOR .
            'create',
            $product_params);

        $response = $this->httpAction(
            'delete',
            'products' .
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
