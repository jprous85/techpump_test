<?php


namespace Src\Cart\Application\Request;

class ShowCartRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
