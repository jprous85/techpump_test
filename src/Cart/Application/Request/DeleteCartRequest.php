<?php


namespace Src\Cart\Application\Request;

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
