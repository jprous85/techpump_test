<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;


final class UserEmailVerifiedAtVOMother
{
    public static function create(): UserEmailVerifiedAtVO
    {
        return new UserEmailVerifiedAtVO(null);
    }

    public static function random(): UserEmailVerifiedAtVO
    {
        return self::create();
    }
}
