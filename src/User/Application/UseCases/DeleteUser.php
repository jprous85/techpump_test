<?php

declare(strict_types = 1);

namespace Src\User\Application\UseCases;

use Src\User\Application\Request\DeleteUserRequest;
use Src\User\Application\Request\ShowUserRequest;
use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Domain\User\ValueObjects\UserUuidVO;


final class DeleteUser
{
    private ShowUser $show__user;

    public function __construct(private UserRepository $repository)
    {
        $this->show__user = new ShowUser($this->repository);
    }

    public function __invoke(DeleteUserRequest $request)
    {
        $response = ($this->show__user)(new ShowUserRequest($request->getUuid()));

        $user_id = new UserUuidVO($response->getUuid());
        $this->repository->delete($user_id);
    }
}
