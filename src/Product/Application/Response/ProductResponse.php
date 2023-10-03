<?php

declare(strict_types=1);

namespace Src\Product\Application\Response;


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


final class ProductResponse
{
    public function __construct(
		private string $uuid,
		private string $reference,
		private string $name,
		private ?string $description,
		private float $price,
		private int $amount,
		private string $available,
		private int $active,
		private ?string $created_at,
		private ?string $updated_at
    )
    {
    }

	public function getUuid(): string {
		return $this->uuid;
	}

	public function getReference(): string {
		return $this->reference;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function getPrice(): float {
		return $this->price;
	}

	public function getAmount(): int {
		return $this->amount;
	}

	public function getAvailable(): string {
		return $this->available;
	}

	public function getActive(): int {
		return $this->active;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?string {
		return $this->updated_at;
	}



    public function toArray(): array
    {
        return [
			"uuid" => $this->uuid,
			"reference" => $this->reference,
			"name" => $this->name,
			"description" => $this->description,
			"price" => $this->price,
			"amount" => $this->amount,
			"available" => $this->available,
			"active" => $this->active,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at,

        ];
    }

    /**
     * @throws \Exception
     */
    public static function responseToEntity(self $response): Product
    {
        return new Product(
			new ProductUuidVO($response->getUuid()),
			new ProductReferenceVO($response->getReference()),
			new ProductNameVO($response->getName()),
			new ProductDescriptionVO($response->getDescription()),
			new ProductPriceVO($response->getPrice()),
			new ProductAmountVO($response->getAmount()),
			new ProductAvailableVO($response->getAvailable()),
			new ProductActiveVO($response->getActive()),
			new ProductCreatedAtVO($response->getCreatedAt()),
			new ProductUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfProductResponse($product): self
    {
        return new self(
			$product->getUuid()->value(),
			$product->getReference()->value(),
			$product->getName()->value(),
			$product->getDescription()->value(),
			$product->getPrice()->value(),
			$product->getAmount()->value(),
			$product->getAvailable()->value(),
			$product->getActive()->value(),
			$product->getCreatedAt()->value(),
			$product->getUpdatedAt()->value(),

        );
    }

}
