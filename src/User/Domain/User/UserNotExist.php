<?php

declare(strict_types = 1);

namespace Src\User\Domain\User;

use Src\Shared\Domain\DomainError;

final class UserNotExist extends DomainError
{
    public function __construct(private int $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The user <%s> does not exist', $this->id);
    }
}
