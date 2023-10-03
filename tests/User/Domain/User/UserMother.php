<?php

namespace Tests\User\Domain\User;

use Src\User\Domain\User\User;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;

use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;
use Tests\User\Domain\User\ValueObjects\UserNameVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVerifiedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserPasswordVOMother;
use Tests\User\Domain\User\ValueObjects\UserRememberTokenVOMother;
use Tests\User\Domain\User\ValueObjects\UserCreatedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserUpdatedAtVOMother;


final class UserMother
{
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
        return new User(
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

    public static function random(): User
    {
        return self::create(
			UserUuidVOMother::random(),
			UserNameVOMother::random(),
			UserEmailVOMother::random(),
			UserEmailVerifiedAtVOMother::random(),
			UserPasswordVOMother::random(),
			UserRememberTokenVOMother::random(),
			UserCreatedAtVOMother::random(),
			UserUpdatedAtVOMother::random(),

        );
    }
}
