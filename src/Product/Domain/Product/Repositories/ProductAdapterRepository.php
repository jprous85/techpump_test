<?php

namespace Src\Product\Domain\Product\Repositories;

use Src\Product\Domain\Product\Product;

interface ProductAdapterRepository
{
    public function productModelAdapter(): ?Product;
}
