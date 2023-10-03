<?php

declare(strict_types=1);

namespace Src\Product\Infrastructure\Persistence\ORM;

use Exception;
use Src\Product\Domain\Product\Product;
use Src\Product\Domain\Product\Repositories\ProductRepository;

use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;
use Src\Product\Infrastructure\Adapter\ProductAdapter;


final class ProductMYSQLRepository implements ProductRepository
{

    public function __construct(private ProductORMModel $model)
    {
    }

    /**
     * @throws Exception
     */
    public function show(ProductUuidVO $id): ?Product
    {
        $query = $this->model->find($id->value());
        return (new ProductAdapter($query))->productModelAdapter();
    }

    /**
     * @throws Exception
     */
    public function showAll(): array
    {
        $eloquent_products = $this->model->all();
        $products = [];

        foreach ($eloquent_products as $eloquent_product) {
            $products[] = (new ProductAdapter($eloquent_product))->productModelAdapter();
        }
        return $products;

    }

    public function save(Product $product): void
    {
        $this->model->create($product->getPrimitives());
    }

    public function update(Product $product): void
    {
        $update_product = $this->model->find($product->getUuid()->value());
        $update_product->update($product->getPrimitives());
    }

    public function delete(ProductUuidVO $uuid): void
    {
        $product = $this->model->find($uuid->value());
        $product->delete();
    }
}
