<?php

declare(strict_types=1);

namespace Src\Cart\Application\Cart\Response;


use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\Cart\ValueObjects\CartCreatedAtVO;
use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;


final class CartResponse
{
    public function __construct(
		private string $uuid,
		private string $user_uuid,
		private string $status,
		private ?string $created_at,
		private ?string $updated_at
    )
    {
    }

	public function getUuid(): string {
		return $this->uuid;
	}

	public function getUserUuid(): string {
		return $this->user_uuid;
	}

	public function getStatus(): string {
		return $this->status;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?string {
		return $this->updated_at;
	}



    public function toArray(): array
    {
        return [
			"uuid" => $this->uuid,
			"user_uuid" => $this->user_uuid,
			"status" => $this->status,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at,

        ];
    }

    public static function responseToEntity(self $response): Cart
    {
        return new Cart(
			new CartUuidVO($response->getUuid()),
			new CartUserUuidVO($response->getUserUuid()),
			new CartStatusVO($response->getStatus()),
			new CartCreatedAtVO($response->getCreatedAt()),
			new CartUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfCartResponse($cart): self
    {
        return new self(
			$cart->getUuid()->value(),
			$cart->getUserUuid()->value(),
			$cart->getStatus()->value(),
			$cart->getCreatedAt()->value(),
			$cart->getUpdatedAt()->value(),

        );
    }

}
