<?php

namespace Src\Cart\Domain\Cart\Repositories;

use Src\Cart\Domain\Cart\Cart;

interface CartAdapterRepository
{
    public function cartModelAdapter(): ?Cart;
}
