<?php

namespace Tests\Cart\Application\Cart;

use Mockery;
use Mockery\MockInterface;
use Src\Cart\Application\Cart\Request\CreateCartRequest;
use Src\Cart\Application\Cart\Request\DeleteCartRequest;
use Src\Cart\Application\Cart\Request\ShowCartRequest;
use Src\Cart\Application\Cart\Request\UpdateCartRequest;
use Src\Cart\Application\Cart\Response\CartResponse;
use Src\Cart\Application\Cart\Response\CartResponses;
use Src\Cart\Application\Cart\UseCases\CreateCart;
use Src\Cart\Application\Cart\UseCases\DeleteCart;
use Src\Cart\Application\Cart\UseCases\ShowAllCart;
use Src\Cart\Application\Cart\UseCases\ShowCart;
use Src\Cart\Application\Cart\UseCases\UpdateCart;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Tests\Cart\Domain\Cart\CartMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUuidVOMother;
use Tests\TestCase;


abstract class CartUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
    }

    protected function shouldCreate(CreateCartRequest $request)
    {
        $cart_id = CartUuidVOMother::random();
        $this->mock->shouldReceive('save')->andReturn($cart_id);

        $creator = new CreateCart($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowCartRequest $request)
    {
        $cart = CartMother::random();
        $cartResponse = CartResponse::SelfCartResponse($cart);

        $this->mock->shouldReceive('show')->andReturn($cart);

        $finder = new ShowCart($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($cartResponse, $result);
    }

    protected function shouldFindAll()
    {

        $cart1 = CartMother::random();
        $cart2 = CartMother::random();
        $cartResponse1 = CartResponse::SelfCartResponse($cart1);
        $cartResponse2 = CartResponse::SelfCartResponse($cart2);

        $cartResponses = new CartResponses($cartResponse1, $cartResponse2);

        $this->mock->shouldReceive('showAll')->andReturns([$cart1, $cart2]);

        $finder = new ShowAllCart($this->mock);
        $result = $finder->__invoke();

        $this->assertEquals($cartResponses, $result);
    }

    protected function shouldUpdate(string $uuid, UpdateCartRequest $request)
    {
        $cart_mother = CartMother::random();
        $this->mock->shouldReceive('show')->andReturn($cart_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateCart($this->mock);
        $update->__invoke($uuid, $request);
    }

    protected function shouldDelete(DeleteCartRequest $uuid)
    {
        $cart = CartMother::random();

        $this->mock->shouldReceive('show')->andReturns($cart);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteCart($this->mock);
        $delete->__invoke($uuid);
    }

    private function repository(): MockInterface | CartRepository
    {
        return Mockery::mock(CartRepository::class);
    }
}
