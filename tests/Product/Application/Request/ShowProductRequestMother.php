<?php

namespace Tests\Product\Application\Request;

use Src\Product\Application\Request\ShowProductRequest;
use Tests\Product\Domain\Product\ValueObjects\ProductUuidVOMother;


class ShowProductRequestMother
{
    public static function create(string $value): ShowProductRequest
    {
        return new ShowProductRequest($value);
    }

    public static function random(): ShowProductRequest
    {
        $uuid = ProductUuidVOMother::random()->value();
        return self::create($uuid);
    }

    private static function wrong(): ShowProductRequest
    {
        $id = ProductUuidVOMother::badValue()->value();
        return self::create($id);
    }
}
