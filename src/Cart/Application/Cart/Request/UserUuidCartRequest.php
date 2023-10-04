<?php

declare(strict_types=1);


namespace Src\Cart\Application\Cart\Request;


final class UserUuidCartRequest
{
    public function __construct(private string $userUuid)
    {
    }

    /**
     * @return string
     */
    public function getUserUuid(): string
    {
        return $this->userUuid;
    }
}
