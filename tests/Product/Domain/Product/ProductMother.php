<?php

namespace Tests\Product\Domain\Product;

use Src\Product\Domain\Product\Product;

use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;
use Src\Product\Domain\Product\ValueObjects\ProductReferenceVO;
use Src\Product\Domain\Product\ValueObjects\ProductNameVO;
use Src\Product\Domain\Product\ValueObjects\ProductDescriptionVO;
use Src\Product\Domain\Product\ValueObjects\ProductPriceVO;
use Src\Product\Domain\Product\ValueObjects\ProductAmountVO;
use Src\Product\Domain\Product\ValueObjects\ProductAvailableVO;
use Src\Product\Domain\Product\ValueObjects\ProductActiveVO;
use Src\Product\Domain\Product\ValueObjects\ProductCreatedAtVO;
use Src\Product\Domain\Product\ValueObjects\ProductUpdatedAtVO;

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


final class ProductMother
{
    public static function create(
		ProductUuidVO $uuid,
		ProductReferenceVO $reference,
		ProductNameVO $name,
		ProductDescriptionVO $description,
		ProductPriceVO $price,
		ProductAmountVO $amount,
		ProductAvailableVO $available,
		ProductActiveVO $active,
		ProductCreatedAtVO $created_at,
		ProductUpdatedAtVO $updated_at,

    ): Product
    {
        return new Product(
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

    public static function random(): Product
    {
        return self::create(
			ProductUuidVOMother::random(),
			ProductReferenceVOMother::random(),
			ProductNameVOMother::random(),
			ProductDescriptionVOMother::random(),
			ProductPriceVOMother::random(),
			ProductAmountVOMother::random(),
			ProductAvailableVOMother::random(),
			ProductActiveVOMother::random(),
			ProductCreatedAtVOMother::random(),
			ProductUpdatedAtVOMother::random(),

        );
    }
}
