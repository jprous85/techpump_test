<?php

namespace Tests\User\Application\Request;

use Src\User\Application\Request\ShowUserRequest;
use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;


class ShowUserRequestMother
{
    public static function create(string $value): ShowUserRequest
    {
        return new ShowUserRequest($value);
    }

    public static function random(): ShowUserRequest
    {
        $id = UserUuidVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): ShowUserRequest
    {
        $id = UserUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
