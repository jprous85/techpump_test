<?php

declare(strict_types=1);

namespace Tests\Product\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Product\Infrastructure\Request\ProductRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class CreateProductAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create_product_and_return_200()
    {
        $product_params = $this->createParams(ProductRequestMother::class);

        $response = $this->httpAction(
            'post',
            'products' .
            DIRECTORY_SEPARATOR .
            'create',
            $product_params);

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
