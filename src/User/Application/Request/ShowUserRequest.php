<?php


namespace Src\User\Application\Request;

class ShowUserRequest
{
    public function __construct(private string $uuid)
    {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
