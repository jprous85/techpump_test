<?php

namespace Src\Product\Application\Request;

class CreateProductRequest
{
    public function __construct(
		private string $uuid,
		private string $reference,
		private string $name,
		private ?string $description,
		private float $price,
		private int $amount,
		private string $available,
		private int $active
    )
    {
    }

	public function getUuid(): string {
		return $this->uuid;
	}

	public function getReference(): string {
		return $this->reference;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function getPrice(): float {
		return $this->price;
	}

	public function getAmount(): int {
		return $this->amount;
	}

	public function getAvailable(): string {
		return $this->available;
	}

	public function getActive(): int {
		return $this->active;
	}

}
