<?php

namespace Tests\Product\Application;

use Src\Product\Application\Request\ShowProductRequest;
use Src\Product\Application\Request\UpdateProductRequest;
use Src\Product\Application\Response\ProductResponse;
use Src\Product\Application\Response\ProductResponses;
use Src\Product\Application\UseCases\CreateProduct;
use Src\Product\Application\UseCases\ShowProduct;
use Src\Product\Application\UseCases\ShowAllProduct;
use Src\Product\Application\UseCases\UpdateProduct;
use Src\Product\Application\UseCases\DeleteProduct;
use Src\Product\Domain\Product\Repositories\ProductRepository;

use Src\Product\Application\Request\CreateProductRequest;
use Src\Product\Application\Request\DeleteProductRequest;


use Mockery;
use Mockery\MockInterface;
use Tests\Product\Domain\Product\ProductMother;
use Tests\TestCase;

abstract class ProductUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
    }

    /**
     * @throws \Exception
     */
    protected function shouldCreate(CreateProductRequest $request)
    {
        $this->mock->shouldReceive('save');

        $creator = new CreateProduct($this->mock);
        $creator->__invoke($request);
    }

    /**
     * @throws \Exception
     */
    protected function shouldFind(ShowProductRequest $request)
    {
        $product = ProductMother::random();
        $productResponse = ProductResponse::SelfProductResponse($product);

        $this->mock->shouldReceive('show')->andReturn($product);

        $finder = new ShowProduct($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($productResponse, $result);
    }

    protected function shouldFindAll()
    {
        $product1 = ProductMother::random();
        $product2 = ProductMother::random();

        $productResponse1 = ProductResponse::SelfProductResponse($product1);
        $productResponse2 = ProductResponse::SelfProductResponse($product2);

        $productResponses = new ProductResponses($productResponse1, $productResponse2);

        $this->mock->shouldReceive('showAll')->andReturns([$product1, $product2]);

        $finder = new ShowAllProduct($this->mock);
        $result = $finder->__invoke();

        $this->assertEquals($productResponses, $result);
    }

    protected function shouldUpdate(string $uuid, UpdateProductRequest $request)
    {
        $product_mother = ProductMother::random();
        $this->mock->shouldReceive('show')->andReturn($product_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateProduct($this->mock);
        $update->__invoke($uuid, $request);
    }

    protected function shouldDelete(DeleteProductRequest $uuid)
    {
        $product = ProductMother::random();

        $this->mock->shouldReceive('show')->andReturns($product);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteProduct($this->mock);
        $delete->__invoke($uuid);
    }

    private function repository(): MockInterface | ProductRepository
    {
        return Mockery::mock(ProductRepository::class);
    }
}
