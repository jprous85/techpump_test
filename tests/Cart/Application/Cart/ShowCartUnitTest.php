<?php

namespace Tests\Cart\Application\Cart;


use Tests\Cart\Application\Cart\Request\ShowCartRequestMother;

class ShowCartUnitTest extends CartUnitTestCase
{
    /** @test */
    public function should_show_Cart(): void
    {
        $this->shouldFind(ShowCartRequestMother::random());
    }
}
