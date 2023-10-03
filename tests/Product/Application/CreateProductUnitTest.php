<?php

namespace Tests\Product\Application;

use Tests\Product\Application\Request\CreateProductRequestMother;


class CreateProductUnitTest extends ProductUnitTestCase
{
    /** @test */
    public function should_create_Product(): void
    {
        $this->shouldCreate(CreateProductRequestMother::random());
        self::assertTrue(true);
    }
}
