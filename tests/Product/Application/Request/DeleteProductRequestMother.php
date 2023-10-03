<?php

namespace Tests\Product\Application\Request;

use Src\Product\Application\Request\DeleteProductRequest;
use Tests\Product\Domain\Product\ValueObjects\ProductUuidVOMother;


class DeleteProductRequestMother
{
    public static function create($value): DeleteProductRequest
    {
        return new DeleteProductRequest($value);
    }

    public static function random(): DeleteProductRequest
    {
        $id = ProductUuidVOMother::random()->value();
        return self::create($id);
    }

    private static function wrong(): DeleteProductRequest
    {
        $id = ProductUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
