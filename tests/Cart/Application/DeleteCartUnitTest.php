<?php

namespace Tests\Cart\Application;


use Tests\Cart\Application\Request\DeleteCartRequestMother;

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
