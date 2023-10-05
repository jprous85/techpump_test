<?php

declare(strict_types = 1);

namespace Src\Product\Domain\Product;

use Carbon\Carbon;
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


final class Product
{
    public function __construct(
		private ProductUuidVO $uuid,
		private ProductReferenceVO $reference,
		private ProductNameVO $name,
		private ?ProductDescriptionVO $description,
		private ProductPriceVO $price,
		private ProductAmountVO $amount,
		private ProductAvailableVO $available,
		private ProductActiveVO $active,
		private ?ProductCreatedAtVO $created_at,
		private ?ProductUpdatedAtVO $updated_at,

    )
    {}

    public static function create(
		ProductUuidVO $uuid,
		ProductReferenceVO $reference,
		ProductNameVO $name,
		ProductDescriptionVO $description,
		ProductPriceVO $price,
		ProductAmountVO $amount,
		ProductAvailableVO $available,
		ProductActiveVO $active

    ): Product
    {
        return new self(
				$uuid,
				$reference,
				$name,
				$description,
				$price,
				$amount,
				$available,
				$active,
                new ProductCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
				new ProductUpdatedAtVO(null)
        );
    }

    /**
     * @throws \Exception
     */
    public function update(
		ProductReferenceVO $reference,
		ProductNameVO $name,
		ProductDescriptionVO $description,
		ProductPriceVO $price,
		ProductAmountVO $amount,
		ProductAvailableVO $available,
		ProductActiveVO $active,

    ): void
    {
		$this->reference = $reference;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->amount = $amount;
		$this->available = $available;
		$this->active = $active;
		$this->updated_at = new ProductUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }




    public function getPrimitives(): array
    {
        return [
			'uuid' => $this->getUuid()->value(),
			'reference' => $this->getReference()->value(),
			'name' => $this->getName()->value(),
			'description' => $this->getDescription()->value(),
			'price' => $this->getPrice()->value(),
			'amount' => $this->getAmount()->value(),
			'available' => $this->getAvailable()->value(),
			'active' => $this->getActive()->value(),
			'created_at' => $this->getCreatedAt()->value(),
			'updated_at' => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
	public function getUuid(): ProductUuidVO {
		return $this->uuid;
	}

	public function getReference(): ProductReferenceVO {
		return $this->reference;
	}

	public function getName(): ProductNameVO {
		return $this->name;
	}

	public function getDescription(): ?ProductDescriptionVO {
		return $this->description;
	}

	public function getPrice(): ProductPriceVO {
		return $this->price;
	}

	public function getAmount(): ProductAmountVO {
		return $this->amount;
	}

	public function getAvailable(): ProductAvailableVO {
		return $this->available;
	}

	public function getActive(): ProductActiveVO {
		return $this->active;
	}

	public function getCreatedAt(): ?ProductCreatedAtVO {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?ProductUpdatedAtVO {
		return $this->updated_at;
	}


    /**
     * @throws \Exception
     */
    public function reduceAmount(): self
    {
        $this->amount = new ProductAmountVO($this->amount->value() - 1);
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function increaseAmount(): self
    {
        $this->amount = new ProductAmountVO($this->amount->value() + 1);
        return $this;
    }

}
