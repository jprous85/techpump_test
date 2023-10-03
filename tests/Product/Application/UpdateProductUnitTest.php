<?php

namespace Tests\Product\Application;

use Tests\Product\Application\Request\ShowProductRequestMother;
use Tests\Product\Application\Request\UpdateProductRequestMother;


class UpdateProductUnitTest extends ProductUnitTestCase
{
    /** @test */
    public function should_update_Product(): void
    {
        $this->shouldUpdate(ShowProductRequestMother::random()->getUuid(), UpdateProductRequestMother::random());
        self::assertTrue(true);
    }
}
