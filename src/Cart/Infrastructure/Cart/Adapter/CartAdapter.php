<?php

namespace Src\Cart\Infrastructure\Cart\Adapter;


use Exception;
use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\Cart\Repositories\CartAdapterRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartCreatedAtVO;
use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;
use Src\Cart\Infrastructure\Cart\Persistence\ORM\CartORMModel;

class CartAdapter implements CartAdapterRepository
{
    public function __construct(
        private CartORMModel $cart
    )
    {
    }

    private function getUuid(): string
    {
        return $this->cart['uuid'];
    }

    private function getUserUuid(): string
    {
        return $this->cart['user_uuid'];
    }

    private function getStatus(): string
    {
        return $this->cart['status'];
    }

    private function getCreatedAt(): string
    {
        return $this->cart['created_at'];
    }

    private function getUpdatedAt(): ?string
    {
        return $this->cart['updated_at'];
    }


    /**
     * @throws Exception
     */
    public function cartModelAdapter(): ?Cart
    {
        if ($this->cart == null) {
            return null;
        }

        return new Cart(
            new CartUuidVO($this->getUuid()),
            new CartUserUuidVO($this->getUserUuid()),
            new CartStatusVO($this->getStatus()),
            new CartCreatedAtVO($this->getCreatedAt()),
            new CartUpdatedAtVO($this->getUpdatedAt()),
        );
    }

}
