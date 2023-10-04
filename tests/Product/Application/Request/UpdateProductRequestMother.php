<?php

namespace Tests\Product\Application\Request;

use Src\Product\Application\Request\UpdateProductRequest;
use Tests\Product\Domain\Product\ValueObjects\ProductReferenceVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductNameVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductDescriptionVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductPriceVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductAmountVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductAvailableVOMother;
use Tests\Product\Domain\Product\ValueObjects\ProductActiveVOMother;


final class UpdateProductRequestMother
{
    public static function create(
		string $reference,
		string $name,
		?string $description,
		float $price,
		int $amount,
		string $available,
		int $active

    ): UpdateProductRequest
    {
        return new UpdateProductRequest(
				$reference,
				$name,
				$description,
				$price,
				$amount,
				$available,
				$active,

        );
    }

    public static function random(): UpdateProductRequest
    {
		$reference = ProductReferenceVOMother::random()->value();
		$name = ProductNameVOMother::random()->value();
		$description = ProductDescriptionVOMother::random()->value();
		$price = ProductPriceVOMother::random()->value();
		$amount = ProductAmountVOMother::random()->value();
		$available = ProductAvailableVOMother::random()->value();
		$active = ProductActiveVOMother::random()->value();

        return self::create(
				$reference,
				$name,
				$description,
				$price,
				$amount,
				$available,
				$active
        );
    }

}
