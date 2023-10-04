<?php

namespace Tests\Product\Application;


use Tests\Product\Application\Request\ShowProductRequestMother;

class ShowProductUnitTest extends ProductUnitTestCase
{
    /** @test
     * @throws \Exception
     */
    public function should_show_Product(): void
    {
        $this->shouldFind(ShowProductRequestMother::random());
    }
}
