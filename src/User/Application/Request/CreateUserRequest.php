<?php

namespace Src\User\Application\Request;

class CreateUserRequest
{
    public function __construct(
		private string $uuid,
		private string $name,
		private string $email,
		private ?string $email_verified_at,
		private string $password,
		private ?string $remember_token,
		private ?string $created_at,
		private ?string $updated_at
    )
    {
    }

	public function getUuid(): string {
		return $this->uuid;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function getEmailVerifiedAt(): ?string {
		return $this->email_verified_at;
	}

	public function getPassword(): string {
		return $this->password;
	}

	public function getRememberToken(): ?string {
		return $this->remember_token;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?string {
		return $this->updated_at;
	}


}
