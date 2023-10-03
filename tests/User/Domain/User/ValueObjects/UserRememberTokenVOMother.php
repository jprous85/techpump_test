<?php

declare(strict_types=1);

namespace Tests\User\Domain\User\ValueObjects;

use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;


final class UserRememberTokenVOMother
{
    public static function create(): UserRememberTokenVO
    {
        return new UserRememberTokenVO(null);
    }

    public static function random(): UserRememberTokenVO
    {
        return self::create();
    }
}
