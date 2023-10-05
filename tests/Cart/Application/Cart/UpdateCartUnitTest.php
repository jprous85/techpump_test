<?php

namespace Tests\Cart\Application\Cart;

use Tests\Cart\Application\Cart\Request\ShowCartRequestMother;
use Tests\Cart\Application\Cart\Request\UpdateCartRequestMother;


class UpdateCartUnitTest extends CartUnitTestCase
{
    /** @test */
    public function should_update_Cart(): void
    {
        $this->shouldUpdate(ShowCartRequestMother::random()->getUuid(), UpdateCartRequestMother::random());
        self::assertTrue(true);
    }
}
