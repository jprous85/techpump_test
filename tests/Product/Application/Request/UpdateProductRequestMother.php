<?php

namespace Tests\Product\Application\Request;

use Src\Product\Application\Request\UpdateProductRequest;
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


final class UpdateProductRequestMother
{
    public static function create(
		string $uuid,
		string $reference,
		string $name,
		?string $description,
		string $price,
		int $amount,
		string $available,
		int $active,
		?string $created_at,
		?string $updated_at,

    ): UpdateProductRequest
    {
        return new UpdateProductRequest(
				$uuid,
				$reference,
				$name,
				$description,
				$price,
				$amount,
				$available,
				$active,
				$created_at,
				$updated_at,

        );
    }

    public static function random(): UpdateProductRequest
    {
		$uuid = ProductUuidVOMother::random()->value();
		$reference = ProductReferenceVOMother::random()->value();
		$name = ProductNameVOMother::random()->value();
		$description = ProductDescriptionVOMother::random()->value();
		$price = ProductPriceVOMother::random()->value();
		$amount = ProductAmountVOMother::random()->value();
		$available = ProductAvailableVOMother::random()->value();
		$active = ProductActiveVOMother::random()->value();
		$created_at = ProductCreatedAtVOMother::random()->value();
		$updated_at = ProductUpdatedAtVOMother::random()->value();

        return self::create(
				$uuid,
				$reference,
				$name,
				$description,
				$price,
				$amount,
				$available,
				$active,
				$created_at,
				$updated_at,

        );
    }

}
