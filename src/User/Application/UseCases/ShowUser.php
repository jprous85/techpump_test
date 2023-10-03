<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\ValueObjects\UserUuidVO;


final class ShowUser
{
    public function __construct(private UserRepository $repository)
    {}

    public function __invoke(ShowUserRequest $id): UserResponse
    {
        $userID = new UserUuidVO($id->getUuid());
        $user = $this->repository->show($userID);

        if (!$user)
        {
            dd();
        }

        return UserResponse::SelfUserResponse($user);
    }
}
