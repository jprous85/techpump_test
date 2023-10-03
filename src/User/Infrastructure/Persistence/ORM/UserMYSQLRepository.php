<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Persistence\ORM;

use Src\User\Domain\User\User;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Infrastructure\Adapter\ProductAdapter;


final class UserMYSQLRepository implements UserRepository
{

    public function __construct(private UserORMModel $model)
    {
    }

    public function show(UserUuidVO $id): ?User
    {
        $query = $this->model->find($id->value());
        return (new ProductAdapter($query))->userModelAdapter();
    }

    public function showAll(): array
    {
        $eloquent_users = $this->model->all();
        $users               = [];

        foreach ($eloquent_users as $eloquent_user) {
            $users[] = (new ProductAdapter($eloquent_user))->userModelAdapter();
        }
        return $users;

    }

    public function save(User $user): void
    {
        $this->model->create($user->getPrimitives());
    }

    public function update(User $user): void
    {
        $update_user = $this->model->find($user->getUuid()->value());
        $update_user->update($user->getPrimitives());

    }

    public function delete(UserUuidVO $id): void
    {
        $user = $this->model->find($id->value());
        $user->delete();
    }
}
