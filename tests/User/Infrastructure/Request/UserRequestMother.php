<?php

namespace Tests\User\Infrastructure\Request;

use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;
use Tests\User\Domain\User\ValueObjects\UserNameVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVOMother;
use Tests\User\Domain\User\ValueObjects\UserEmailVerifiedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserPasswordVOMother;
use Tests\User\Domain\User\ValueObjects\UserRememberTokenVOMother;
use Tests\User\Domain\User\ValueObjects\UserCreatedAtVOMother;
use Tests\User\Domain\User\ValueObjects\UserUpdatedAtVOMother;


final class UserRequestMother
{
    public static function random(): array
    {
        return [
			'uuid' => UserUuidVOMother::random()->value(),
			'name' => UserNameVOMother::random()->value(),
			'email' => UserEmailVOMother::random()->value(),
			'email_verified_at' => UserEmailVerifiedAtVOMother::random()->value(),
			'password' => UserPasswordVOMother::random()->value(),
			'remember_token' => UserRememberTokenVOMother::random()->value(),
			'created_at' => UserCreatedAtVOMother::random()->value(),
			'updated_at' => UserUpdatedAtVOMother::random()->value(),
        ];
    }
}
