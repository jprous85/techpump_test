<?php

declare(strict_types=1);


namespace Tests\Cart\Application\CartItem;


use Mockery;
use Mockery\MockInterface;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Tests\TestCase;

abstract class CartItemUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mock = $this->repository();
    }





    private function repository(): MockInterface|CartItemRepository
    {
        return Mockery::mock(CartItemRepository::class);
    }
}
