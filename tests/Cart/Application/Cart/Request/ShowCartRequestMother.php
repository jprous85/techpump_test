<?php

namespace Tests\Cart\Application\Cart\Request;

use Src\Cart\Application\Cart\Request\ShowCartRequest;
use Tests\Cart\Domain\Cart\ValueObjects\CartUuidVOMother;


class ShowCartRequestMother
{
    public static function create(string $value): ShowCartRequest
    {
        return new ShowCartRequest($value);
    }

    public static function random(): ShowCartRequest
    {
        $uuid = CartUuidVOMother::random()->value();
        return self::create($uuid);
    }

    private static function wrong(): ShowCartRequest
    {
        $id = CartUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
