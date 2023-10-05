<?php

namespace Tests\Cart\Application\Cart\Request;

use Src\Cart\Application\Cart\Request\UpdateCartRequest;
use Tests\Cart\Domain\Cart\ValueObjects\CartStatusVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUserUuidVOMother;


final class UpdateCartRequestMother
{
    public static function create(
		string $user_uuid,
		string $status,

    ): UpdateCartRequest
    {
        return new UpdateCartRequest(
				$user_uuid,
				$status
        );
    }

    public static function random(): UpdateCartRequest
    {
		$user_uuid = CartUserUuidVOMother::random()->value();
		$status = CartStatusVOMother::random()->value();

        return self::create(
				$user_uuid,
				$status
        );
    }

}
