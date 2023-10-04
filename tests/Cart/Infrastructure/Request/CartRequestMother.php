<?php

namespace Tests\Cart\Infrastructure\Request;

use Tests\Cart\Domain\Cart\ValueObjects\CartUuidVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUserUuidVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartStatusVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartCreatedAtVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVOMother;


final class CartRequestMother
{
    public static function random(): array
    {
        return [
			'uuid' => CartUuidVOMother::random()->value(),
			'user_uuid' => CartUserUuidVOMother::random()->value(),
			'status' => CartStatusVOMother::random()->value(),
			'created_at' => CartCreatedAtVOMother::random()->value(),
			'updated_at' => CartUpdatedAtVOMother::random()->value(),

        ];
    }
}
