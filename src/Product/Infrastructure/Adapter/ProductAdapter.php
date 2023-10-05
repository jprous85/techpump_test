<?php

namespace Src\Product\Infrastructure\Adapter;

use Src\Product\Domain\Product\Product;
use Src\Product\Domain\Product\Repositories\ProductAdapterRepository;
use Src\Product\Domain\Product\ValueObjects\ProductActiveVO;
use Src\Product\Domain\Product\ValueObjects\ProductAmountVO;
use Src\Product\Domain\Product\ValueObjects\ProductAvailableVO;
use Src\Product\Domain\Product\ValueObjects\ProductCreatedAtVO;
use Src\Product\Domain\Product\ValueObjects\ProductDescriptionVO;
use Src\Product\Domain\Product\ValueObjects\ProductNameVO;
use Src\Product\Domain\Product\ValueObjects\ProductPriceVO;
use Src\Product\Domain\Product\ValueObjects\ProductReferenceVO;
use Src\Product\Domain\Product\ValueObjects\ProductUpdatedAtVO;
use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;
use Src\Product\Infrastructure\Persistence\ORM\ProductORMModel;

class ProductAdapter implements ProductAdapterRepository
{
    public function __construct(
        private ?ProductORMModel $product
    )
    {
    }

    private function getUuid(): string
    {
        return $this->product['uuid'];
    }

    private function getReference(): string
    {
        return $this->product['reference'];
    }

    private function getName(): string
    {
        return $this->product['name'];
    }

    private function getDescription(): string
    {
        return $this->product['description'];
    }

    private function getPrice(): float
    {
        return (float) $this->product['price'];
    }

    private function getAmount(): int
    {
        return (int) $this->product['amount'];
    }

    private function getAvailable(): string
    {
        return $this->product['available'];
    }

    private function getActive(): string
    {
        return $this->product['active'];
    }

    private function getCreatedAt(): string
    {
        return $this->product['created_at'];
    }

    private function getUpdatedAt(): ?string
    {
        return $this->product['updated_at'];
    }

    /**
     * @throws \Exception
     */
    public function productModelAdapter(): ?Product
    {
        if ($this->product == null) {
            return null;
        }

        return new Product(
            new ProductUuidVO($this->getUuid()),
            new ProductReferenceVO($this->getReference()),
            new ProductNameVO($this->getName()),
            new ProductDescriptionVO($this->getDescription()),
            new ProductPriceVO($this->getPrice()),
            new ProductAmountVO($this->getAmount()),
            new ProductAvailableVO($this->getAvailable()),
            new ProductActiveVO($this->getActive()),
            new ProductCreatedAtVO($this->getCreatedAt()),
            new ProductUpdatedAtVO($this->getUpdatedAt() ?? null),
        );
    }

}
