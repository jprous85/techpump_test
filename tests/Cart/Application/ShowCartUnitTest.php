<?php

namespace Tests\Cart\Application;


use Tests\Cart\Application\Request\ShowCartRequestMother;

class ShowCartUnitTest extends CartUnitTestCase
{
    /** @test */
    public function should_show_Cart(): void
    {
        $this->shouldFind(ShowCartRequestMother::random());
    }
}
