<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\CreateUserRequest;
use Src\User\Domain\User\User;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;


final class CreateUser
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(CreateUserRequest $request): void
    {
        $user = self::mapper($request);
        $this->repository->save($user);
    }

    private function mapper(CreateUserRequest $request): User
    {
        return User::create(
			new UserUuidVO($request->getUuid()),
			new UserNameVO($request->getName()),
			new UserEmailVO($request->getEmail()),
			new UserEmailVerifiedAtVO($request->getEmailVerifiedAt()),
			new UserPasswordVO($request->getPassword()),
			new UserRememberTokenVO($request->getRememberToken()),
			new UserCreatedAtVO($request->getCreatedAt()),
			new UserUpdatedAtVO($request->getUpdatedAt()),

        );
    }
}
