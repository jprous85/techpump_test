<?php

declare(strict_types=1);

namespace Src\User\Application\Response;


use Src\User\Domain\User\User;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;


final class UserResponse
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



    public function toArray(): array
    {
        return [
			"uuid" => $this->uuid,
			"name" => $this->name,
			"email" => $this->email,
			"email_verified_at" => $this->email_verified_at,
			"password" => $this->password,
			"remember_token" => $this->remember_token,
			"created_at" => $this->created_at,
			"updated_at" => $this->updated_at,

        ];
    }

    public static function responseToEntity(self $response): User
    {
        return new User(
			new UserUuidVO($response->getUuid()),
			new UserNameVO($response->getName()),
			new UserEmailVO($response->getEmail()),
			new UserEmailVerifiedAtVO($response->getEmailVerifiedAt()),
			new UserPasswordVO($response->getPassword()),
			new UserRememberTokenVO($response->getRememberToken()),
			new UserCreatedAtVO($response->getCreatedAt()),
			new UserUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfUserResponse($user): self
    {
        return new self(
			$user->getUuid()->value(),
			$user->getName()->value(),
			$user->getEmail()->value(),
			$user->getEmailVerifiedAt()->value(),
			$user->getPassword()->value(),
			$user->getRememberToken()->value(),
			$user->getCreatedAt()->value(),
			$user->getUpdatedAt()->value(),

        );
    }

}
