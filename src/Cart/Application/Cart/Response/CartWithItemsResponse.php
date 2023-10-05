<?php

declare(strict_types=1);

namespace Src\Cart\Application\Cart\Response;



final class CartWithItemsResponse
{
    public function __construct(
		private string $uuid,
		private string $user_uuid,
        private array $cart_items,
        private int $total_items,
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

    public function getCartItems(): array
    {
        return $this->cart_items;
    }

    public function getTotalItems(): int
    {
        return $this->total_items;
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
            "products" => $this->cart_items,
			"status" => $this->status,
            "total_items" => $this->total_items,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at,
        ];
    }

    public static function SelfCartResponse($cart, $cartItemResponse, $totalItems): self
    {
        return new self(
			$cart->getUuid()->value(),
			$cart->getUserUuid()->value(),
            $cartItemResponse,
            $totalItems,
			$cart->getStatus()->value(),
			$cart->getCreatedAt()->value(),
			$cart->getUpdatedAt()->value(),
        );
    }
}
