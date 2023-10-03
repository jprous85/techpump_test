<?php

declare(strict_types = 1);

namespace Src\Product\Application\UseCases;

use Src\Product\Application\Request\CreateProductRequest;
use Src\Product\Domain\Product\Product;
use Src\Product\Domain\Product\Repositories\ProductRepository;

use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;
use Src\Product\Domain\Product\ValueObjects\ProductReferenceVO;
use Src\Product\Domain\Product\ValueObjects\ProductNameVO;
use Src\Product\Domain\Product\ValueObjects\ProductDescriptionVO;
use Src\Product\Domain\Product\ValueObjects\ProductPriceVO;
use Src\Product\Domain\Product\ValueObjects\ProductAmountVO;
use Src\Product\Domain\Product\ValueObjects\ProductAvailableVO;
use Src\Product\Domain\Product\ValueObjects\ProductActiveVO;


final class CreateProduct
{

    public function __construct(private ProductRepository $repository)
    {
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CreateProductRequest $request): void
    {
        $product = self::mapper($request);
        $this->repository->save($product);
    }

    /**
     * @throws \Exception
     */
    private function mapper(CreateProductRequest $request): Product
    {
        return Product::create(
			new ProductUuidVO($request->getUuid()),
			new ProductReferenceVO($request->getReference()),
			new ProductNameVO($request->getName()),
			new ProductDescriptionVO($request->getDescription()),
			new ProductPriceVO($request->getPrice()),
			new ProductAmountVO($request->getAmount()),
			new ProductAvailableVO($request->getAvailable()),
			new ProductActiveVO($request->getActive()),

        );
    }
}
