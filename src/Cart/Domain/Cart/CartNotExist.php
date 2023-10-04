<?php

declare(strict_types = 1);

namespace Src\Cart\Domain\Cart;

use Src\Shared\Domain\DomainError;

final class CartNotExist extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'cart_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The cart <%s> does not exist', $this->id);
    }
}
