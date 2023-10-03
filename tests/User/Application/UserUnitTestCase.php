<?php

namespace Tests\User\Application;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Application\Response\UserResponses;
use Src\User\Application\UseCases\CreateUser;
use Src\User\Application\UseCases\ShowUser;
use Src\User\Application\UseCases\ShowAllUser;
use Src\User\Application\UseCases\UpdateUser;
use Src\User\Application\UseCases\DeleteUser;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Application\Request\CreateUserRequest;
use Src\User\Application\Request\DeleteUserRequest;


use Mockery;
use Mockery\MockInterface;
use Tests\User\Domain\User\UserMother;
use Tests\TestCase;
use Tests\User\Domain\User\ValueObjects\UserUuidVOMother;

abstract class UserUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock = $this->repository();
    }

    protected function shouldCreate(CreateUserRequest $request)
    {
        $user_id = UserUuidVOMother::random();
        $this->mock->shouldReceive('save')->andReturn($user_id);

        $creator = new CreateUser($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowUserRequest $request)
    {
        $user = UserMother::random();
        $userResponse = UserResponse::SelfUserResponse($user);

        $this->mock->shouldReceive('show')->andReturn($user);

        $finder = new ShowUser($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($result, $userResponse);
    }

    protected function shouldFindAll()
    {
        $user1 = UserMother::random();
        $user2 = UserMother::random();

        $userResponse1 = UserResponse::SelfUserResponse($user1);
        $userResponse2 = UserResponse::SelfUserResponse($user2);

        $userResponses = new UserResponses($userResponse1, $userResponse2);

        $this->mock->shouldReceive('showAll')->andReturns([$user1, $user2]);

        $finder = new ShowAllUser($this->mock);
        $result = $finder->__invoke();

        $this->assertEquals($result, $userResponses);
    }

    protected function shouldUpdate(string $id, UpdateUserRequest $request)
    {
        $user_mother = UserMother::random();
        $this->mock->shouldReceive('show')->andReturn($user_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateUser($this->mock);
        $update->__invoke($id, $request);
    }

    protected function shouldDelete(DeleteUserRequest $id)
    {
        $user = UserMother::random();

        $this->mock->shouldReceive('show')->andReturns($user);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteUser($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface|UserRepository
    {
        return Mockery::mock(UserRepository::class);
    }
}
