<?php

namespace Tests\Cart\Application;

use Tests\Cart\Application\Request\CreateCartRequestMother;


class CreateCartUnitTest extends CartUnitTestCase
{
    /** @test */
    public function should_create_Cart(): void
    {
        $this->shouldCreate(CreateCartRequestMother::random());
        self::assertTrue(true);
    }
}
