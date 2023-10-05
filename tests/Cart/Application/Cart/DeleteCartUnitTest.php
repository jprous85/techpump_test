<?php

namespace Tests\Cart\Application\Cart;


use Tests\Cart\Application\Cart\Request\DeleteCartRequestMother;

class DeleteCartUnitTest extends CartUnitTestCase
{
    /**
     * @test
     */
    public function should_delete_Cart(): void
    {
        $this->shouldDelete(DeleteCartRequestMother::random());
        self::assertTrue(true);
    }
}
