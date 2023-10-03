<?php

declare(strict_types = 1);

namespace Src\Product\Application\UseCases;

use Src\Product\Application\Request\DeleteProductRequest;
use Src\Product\Application\Request\ShowProductRequest;
use Src\Product\Domain\Product\Repositories\ProductRepository;
use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;


final class DeleteProduct
{
    private ShowProduct $show__product;

    public function __construct(private ProductRepository $repository)
    {
        $this->show__product = new ShowProduct($this->repository);
    }

    public function __invoke(DeleteProductRequest $request)
    {
        $response = ($this->show__product)(new ShowProductRequest($request->getUuid()));

        $product_id = new ProductUuidVO($response->getUuid());
        $this->repository->delete($product_id);
    }
}
