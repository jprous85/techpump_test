<?php

namespace Tests\Cart\Application\Request;

use Src\Cart\Application\Request\DeleteCartRequest;
use Tests\Cart\Domain\Cart\ValueObjects\CartUuidVOMother;


class DeleteCartRequestMother
{
    public static function create($value): DeleteCartRequest
    {
        return new DeleteCartRequest($value);
    }

    public static function random(): DeleteCartRequest
    {
        $id = CartUuidVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteCartRequest
    {
        $id = CartUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
