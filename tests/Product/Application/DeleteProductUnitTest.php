<?php

namespace Tests\Product\Application;


use Tests\Product\Application\Request\DeleteProductRequestMother;

class DeleteProductUnitTest extends ProductUnitTestCase
{
    /**
     * @test
     */
    public function should_delete_Product(): void
    {
        $this->shouldDelete(DeleteProductRequestMother::random());
        $this->assertTrue(true);
    }
}
