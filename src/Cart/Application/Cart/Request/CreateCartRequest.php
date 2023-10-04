<?php

namespace Src\Cart\Application\Cart\Request;

class CreateCartRequest
{
    public function __construct(
		private string $uuid,
		private string $user_uuid,
		private string $status
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
}
