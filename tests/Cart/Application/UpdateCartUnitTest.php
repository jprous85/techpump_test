<?php

namespace Tests\Cart\Application;

use Tests\Cart\Application\Request\ShowCartRequestMother;
use Tests\Cart\Application\Request\UpdateCartRequestMother;


class UpdateCartUnitTest extends CartUnitTestCase
{
    /** @test */
    public function should_update_Cart(): void
    {
        $this->shouldUpdate(ShowCartRequestMother::random()->getUuid(), UpdateCartRequestMother::random());
        self::assertTrue(true);
    }
}
