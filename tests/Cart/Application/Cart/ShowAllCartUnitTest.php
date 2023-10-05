<?php

namespace Tests\Cart\Application\Cart;


class ShowAllCartUnitTest extends CartUnitTestCase
{
    /** @test */
    public function should_show_all_Cart(): void
    {
        $this->shouldFindAll();
    }
}
