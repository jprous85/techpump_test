<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\DeleteUserRequest;
use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;


class DeleteUserRequestMother
{
    public static function create($value): DeleteUserRequest
    {
        return new DeleteUserRequest($value);
    }

    public static function random(): DeleteUserRequest
    {
        $id = UserUuidVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteUserRequest
    {
        $id = UserUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
