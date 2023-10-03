<?php

declare(strict_types = 1);

namespace Src\Product\Application\UseCases;

use Src\Product\Application\Request\ShowProductRequest;
use Src\Product\Application\Request\UpdateProductRequest;
use Src\Product\Application\Response\ProductResponse;
use Src\Product\Domain\Product\Repositories\ProductRepository;
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


final class UpdateProduct
{
    private ShowProduct $show__product;
    public function __construct(private ProductRepository $repository)
    {
        $this->show__product = new ShowProduct($this->repository);
    }

    public function __invoke(string $id, UpdateProductRequest $request)
    {
        $response = ($this->show__product)(new ShowProductRequest($id));
        $product = ProductResponse::responseToEntity($response);

        $product = $this->mapper($product, $request);
        $this->repository->update($product);
    }

    /**
     * @throws \Exception
     */
    private function mapper(Product $product, $request): Product
    {
			$reference = $request->getReference() ? new ProductReferenceVO($request->getReference()) : $product->getReference();
			$name = $request->getName() ? new ProductNameVO($request->getName()) : $product->getName();
			$description = $request->getDescription() ? new ProductDescriptionVO($request->getDescription()) : $product->getDescription();
			$price = $request->getPrice() ? new ProductPriceVO($request->getPrice()) : $product->getPrice();
			$amount = $request->getAmount() ? new ProductAmountVO($request->getAmount()) : $product->getAmount();
			$available = $request->getAvailable() ? new ProductAvailableVO($request->getAvailable()) : $product->getAvailable();
			$active = $request->getActive() ? new ProductActiveVO($request->getActive()) : $product->getActive();

        $product->update(
				$reference,
				$name,
				$description,
				$price,
				$amount,
				$available,
				$active,
        );

        return $product;
    }
}
