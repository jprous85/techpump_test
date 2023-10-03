<?php

declare(strict_types = 1);

namespace Src\User\Domain\User;


use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;


final class User
{
    public function __construct(
		private UserUuidVO $uuid,
		private UserNameVO $name,
		private UserEmailVO $email,
		private ?UserEmailVerifiedAtVO $email_verified_at,
		private UserPasswordVO $password,
		private ?UserRememberTokenVO $remember_token,
		private ?UserCreatedAtVO $created_at,
		private ?UserUpdatedAtVO $updated_at,

    )
    {}

    public static function create(
		UserUuidVO $uuid,
		UserNameVO $name,
		UserEmailVO $email,
		UserEmailVerifiedAtVO $email_verified_at,
		UserPasswordVO $password,
		UserRememberTokenVO $remember_token,
		UserCreatedAtVO $created_at,
		UserUpdatedAtVO $updated_at,

    ): User
    {
        return new self(
				$uuid,
				$name,
				$email,
				$email_verified_at,
				$password,
				$remember_token,
				$created_at,
				$updated_at,
        );
    }

    public function update(
		UserUuidVO $uuid,
		UserNameVO $name,
		UserEmailVO $email,
		UserEmailVerifiedAtVO $email_verified_at,
		UserPasswordVO $password,
		UserRememberTokenVO $remember_token,
		UserCreatedAtVO $created_at,
		UserUpdatedAtVO $updated_at,

    ): void
    {
		$this->uuid = $uuid;
		$this->name = $name;
		$this->email = $email;
		$this->email_verified_at = $email_verified_at;
		$this->password = $password;
		$this->remember_token = $remember_token;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
    }

    public function getPrimitives(): array
    {
        return [
			'uuid' => $this->getUuid()->value(),
			'name' => $this->getName()->value(),
			'email' => $this->getEmail()->value(),
			'email_verified_at' => $this->getEmailVerifiedAt()->value(),
			'password' => $this->getPassword()->value(),
			'remember_token' => $this->getRememberToken()->value(),
			'created_at' => $this->getCreatedAt()->value(),
			'updated_at' => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
	public function getUuid(): UserUuidVO {
		return $this->uuid;
	}

	public function getName(): UserNameVO {
		return $this->name;
	}

	public function getEmail(): UserEmailVO {
		return $this->email;
	}

	public function getEmailVerifiedAt(): ?UserEmailVerifiedAtVO {
		return $this->email_verified_at;
	}

	public function getPassword(): UserPasswordVO {
		return $this->password;
	}

	public function getRememberToken(): ?UserRememberTokenVO {
		return $this->remember_token;
	}

	public function getCreatedAt(): ?UserCreatedAtVO {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?UserUpdatedAtVO {
		return $this->updated_at;
	}
}
