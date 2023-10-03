<?php

namespace Tests\Product\Application;


class ShowAllProductUnitTest extends ProductUnitTestCase
{
    /** @test */
    public function should_show_all_Product(): void
    {
        $this->shouldFindAll();
    }
}
