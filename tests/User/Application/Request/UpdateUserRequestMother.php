<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\UpdateUserRequest;
use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;
use Tests\User\Domain\User\ValueObjects\UserNameVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVerifiedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserPasswordVOMother;
use Tests\User\Domain\User\ValueObjects\UserRememberTokenVOMother;
use Tests\User\Domain\User\ValueObjects\UserCreatedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserUpdatedAtVOMother;


final class UpdateUserRequestMother
{
    public static function create(
		string $uuid,
		string $name,
		string $email,
		?string $email_verified_at,
		string $password,
		?string $remember_token,
		?string $created_at,
		?string $updated_at,

    ): UpdateUserRequest
    {
        return new UpdateUserRequest(
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

    public static function random(): UpdateUserRequest
    {
		$uuid = UserUuidVOMother::random()->value();
		$name = UserNameVOMother::random()->value();
		$email = UserEmailVOMother::random()->value();
		$email_verified_at = UserEmailVerifiedAtVOMother::random()->value();
		$password = UserPasswordVOMother::random()->value();
		$remember_token = UserRememberTokenVOMother::random()->value();
		$created_at = UserCreatedAtVOMother::random()->value();
		$updated_at = UserUpdatedAtVOMother::random()->value();

        return self::create(
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

}
