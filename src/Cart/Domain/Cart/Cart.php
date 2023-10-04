<?php

declare(strict_types=1);

namespace Src\Cart\Domain\Cart;

use Carbon\Carbon;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;
use Src\Cart\Domain\Cart\ValueObjects\CartCreatedAtVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVO;


final class Cart
{
    public function __construct(
        private CartUuidVO       $uuid,
        private CartUserUuidVO   $user_uuid,
        private CartStatusVO     $status,
        private ?CartCreatedAtVO $created_at,
        private ?CartUpdatedAtVO $updated_at,

    )
    {
    }

    public static function create(
        CartUuidVO     $uuid,
        CartUserUuidVO $user_uuid,
        CartStatusVO   $status,

    ): Cart
    {
        return new self(
            $uuid,
            $user_uuid,
            $status,
            new CartCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
            new CartUpdatedAtVO(null)
        );
    }

    public function update(
        CartStatusVO $status

    ): void
    {
        $this->status     = $status;
        $this->updated_at = new CartUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

    public function getPrimitives(): array
    {
        return [
            'uuid'       => $this->getUuid()->value(),
            'user_uuid'  => $this->getUserUuid()->value(),
            'status'     => $this->getStatus()->value(),
            'created_at' => $this->getCreatedAt()->value(),
            'updated_at' => $this->getUpdatedAt()->value(),
        ];
    }

    /**
     * Getters
     */
    public function getUuid(): CartUuidVO
    {
        return $this->uuid;
    }

    public function getUserUuid(): CartUserUuidVO
    {
        return $this->user_uuid;
    }

    public function getStatus(): CartStatusVO
    {
        return $this->status;
    }

    public function getCreatedAt(): ?CartCreatedAtVO
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?CartUpdatedAtVO
    {
        return $this->updated_at;
    }

}
