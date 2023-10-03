<?php

namespace Tests\Product\Application;

use Src\Product\Application\Request\ShowProductRequest;
use Src\Product\Application\Request\UpdateProductRequest;
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

    protected function shouldCreate(CreateProductRequest $request)
    {
        $this->mock->shouldReceive('save');

        $creator = new CreateProduct($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowProductRequest $request)
    {
        $product = ProductMother::random();

        $this->mock->shouldReceive('show')->andReturn($product);

        $finder = new ShowProduct($this->mock);
        $finder->__invoke($request);
    }

    protected function shouldFindAll()
    {
        $this->mock->shouldReceive('showAll')->andReturns(array());

        $finder = new ShowAllProduct($this->mock);
        $finder->__invoke();
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
