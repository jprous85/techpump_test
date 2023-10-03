<?php

namespace Src\User\Infrastructure\Adapter;

use Src\User\Domain\User\Repositories\UserAdapterRepository;
use Src\User\Domain\User\User;

use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;

class UserAdapter implements UserAdapterRepository
{
    public function __construct(
        private UserORMModel $user
    )
    {
    }

    private function getUuid(): string
    {
        return $this->user['uuid'];
    }

    private function getName(): string
    {
        return $this->user['name'];
    }

    private function getEmail(): string
    {
        return $this->user['email'];
    }

    private function getPassword(): string
    {
        return $this->user['password'];
    }

    private function getEmailVerifiedAt(): ?string
    {
        return $this->user['email_verified_at'];
    }

    private function getRememberToken(): ?string
    {
        return $this->user['remember_token'];
    }

    private function getCreatedAt(): ?string
    {
        return $this->user['created_at'];
    }

    private function getUpdatedAt(): ?string
    {
        return $this->user['updated_at'];
    }

    public function userModelAdapter(): ?User
    {
        if ($this->user == null) {
            return null;
        }

        return new User(
            new UserUuidVO($this->getUuid()),
            new UserNameVO($this->getName()),
            new UserEmailVO($this->getEmail()),
            new UserEmailVerifiedAtVO($this->getEmailVerifiedAt()),
            new UserPasswordVO($this->getPassword()),
            new UserRememberTokenVO($this->getRememberToken()),
            new UserCreatedAtVO($this->getCreatedAt()),
            new UserUpdatedAtVO($this->getUpdatedAt() ?? ''),
        );
    }

}
