<?php

namespace Tests\Product\Infrastructure\Request;

use Tests\Product\Domain\Product\ValueObjects\ProductUuidVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductReferenceVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductNameVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductDescriptionVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductPriceVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductAmountVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductAvailableVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductActiveVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductCreatedAtVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductUpdatedAtVOMother;


final class ProductRequestMother
{
    public static function random(): array
    {
        return [
			'uuid' => ProductUuidVOMother::random()->value(),
			'reference' => ProductReferenceVOMother::random()->value(),
			'name' => ProductNameVOMother::random()->value(),
			'description' => ProductDescriptionVOMother::random()->value(),
			'price' => ProductPriceVOMother::random()->value(),
			'amount' => ProductAmountVOMother::random()->value(),
			'available' => ProductAvailableVOMother::random()->value(),
			'active' => ProductActiveVOMother::random()->value(),
			'created_at' => ProductCreatedAtVOMother::random()->value(),
			'updated_at' => ProductUpdatedAtVOMother::random()->value(),

        ];
    }
}
