<?php

namespace Src\Cart\Application\Request;

class UpdateCartRequest
{
    public function __construct(
		private string $user_uuid,
		private string $status,
    )
    {
    }

	public function getUserUuid(): string {
		return $this->user_uuid;
	}

	public function getStatus(): string {
		return $this->status;
	}
}
