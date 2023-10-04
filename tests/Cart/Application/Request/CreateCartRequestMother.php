<?php

namespace Tests\Cart\Application\Request;

use Src\Cart\Application\Request\CreateCartRequest;
use Tests\Cart\Domain\Cart\ValueObjects\CartUuidVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUserUuidVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartStatusVOMother;


final class CreateCartRequestMother
{
    public static function create(
		string $uuid,
		string $user_uuid,
		string $status

    ): CreateCartRequest
    {
        return new CreateCartRequest(
				$uuid,
				$user_uuid,
				$status

        );
    }

    public static function random(): CreateCartRequest
    {
		$uuid = CartUuidVOMother::random()->value();
		$user_uuid = CartUserUuidVOMother::random()->value();
		$status = CartStatusVOMother::random()->value();

        return self::create(
				$uuid,
				$user_uuid,
				$status
        );
    }

}