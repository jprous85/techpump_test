<?php

namespace Src\Product\Domain\Product\Repositories;

use Src\Product\Domain\Product\Product;
use Src\Product\Domain\Product\ValueObjects\ProductUuidVO;

interface ProductRepository
{
    public function show(ProductUuidVO $id): ?Product;

    public function showAll(): array;

    public function save(Product $product): void;

    public function update(Product $product): void;

    public function delete(ProductUuidVO $uuid): void;
}
