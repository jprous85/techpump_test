<?php

declare(strict_types=1);

namespace Tests\Product\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Product\Infrastructure\Request\ProductRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class UpdateProductAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_update_product_and_return_200()
    {
        $product_params = $this->createParams(ProductRequestMother::class);

        $params = $this->createParams(ProductRequestMother::class);
        unset($params['id']);

        $response_created = $this->httpAction(
            'post',
            'products' .
            DIRECTORY_SEPARATOR .
            'create',
            $product_params);

        $response = $this->httpAction(
            'put',
            'products' .
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
