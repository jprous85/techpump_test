<?php

namespace Src\User\Domain\User\Repositories;

use Src\User\Domain\User\User;
use Src\User\Domain\User\ValueObjects\UserUuidVO;

interface UserRepository
{
    public function show(UserUuidVO $id): ?User;

    public function showAll(): array;

    public function save(User $user): void;

    public function update(User $user): void;

    public function delete(UserUUidVO $id): void;
}
