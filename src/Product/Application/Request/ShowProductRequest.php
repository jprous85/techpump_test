<?php


namespace Src\Product\Application\Request;

class ShowProductRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
