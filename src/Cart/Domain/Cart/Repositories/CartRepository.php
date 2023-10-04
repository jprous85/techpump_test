<?php

namespace Src\Cart\Domain\Cart\Repositories;

use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;

interface CartRepository
{
    public function show(CartUuidVO $id): ?Cart;

    public function showAll(): array;

    public function save(Cart $cart): void;

    public function update(Cart $cart): void;

    public function delete(CartUuidVO $id): void;
}
