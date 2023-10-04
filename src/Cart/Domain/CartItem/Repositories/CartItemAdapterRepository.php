<?php

namespace Src\Cart\Domain\CartItem\Repositories;

use Src\Cart\Domain\CartItem\CartItem;

interface CartItemAdapterRepository
{
    public function cartItemModelAdapter(): ?CartItem;
}
