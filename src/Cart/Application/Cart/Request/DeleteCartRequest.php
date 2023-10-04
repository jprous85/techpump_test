<?php


namespace Src\Cart\Application\Cart\Request;

class DeleteCartRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
