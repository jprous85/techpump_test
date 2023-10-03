<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\User;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;


final class UpdateUser
{
    private ShowUser $show__user;
    public function __construct(private UserRepository $repository)
    {
        $this->show__user = new ShowUser($this->repository);
    }

    public function __invoke(string $id, UpdateUserRequest $request)
    {
        $response = ($this->show__user)(new ShowUserRequest($id));
        $user = UserResponse::responseToEntity($response);

        $user = $this->mapper($user, $request);
        $this->repository->update($user);
    }

    private function mapper(User $user, $request): User
    {
			$uuid = $request->getUuid() ? new UserUuidVO($request->getUuid()) : $user->getUuid();
			$name = $request->getName() ? new UserNameVO($request->getName()) : $user->getName();
			$email = $request->getEmail() ? new UserEmailVO($request->getEmail()) : $user->getEmail();
			$email_verified_at = $request->getEmailVerifiedAt() ? new UserEmailVerifiedAtVO($request->getEmailVerifiedAt()) : $user->getEmailVerifiedAt();
			$password = $request->getPassword() ? new UserPasswordVO($request->getPassword()) : $user->getPassword();
			$remember_token = $request->getRememberToken() ? new UserRememberTokenVO($request->getRememberToken()) : $user->getRememberToken();
			$created_at = $request->getCreatedAt() ? new UserCreatedAtVO($request->getCreatedAt()) : $user->getCreatedAt();
			$updated_at = $request->getUpdatedAt() ? new UserUpdatedAtVO($request->getUpdatedAt()) : $user->getUpdatedAt();

        $user->update(
				$uuid,
				$name,
				$email,
				$email_verified_at,
				$password,
				$remember_token,
				$created_at,
				$updated_at,
        );

        return $user;
    }
}
