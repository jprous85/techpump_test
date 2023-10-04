<?php

namespace Tests\Cart\Domain\Cart;

use Src\Cart\Domain\Cart\Cart;

use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\Cart\ValueObjects\CartStatusVO;
use Src\Cart\Domain\Cart\ValueObjects\CartCreatedAtVO;
use Src\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVO;

use Tests\Cart\Domain\Cart\ValueObjects\CartUuidVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUserUuidVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartStatusVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartCreatedAtVOMother;
use Tests\Cart\Domain\Cart\ValueObjects\CartUpdatedAtVOMother;


final class CartMother
{
    public static function create(
		CartUuidVO $uuid,
		CartUserUuidVO $user_uuid,
		CartStatusVO $status,
		CartCreatedAtVO $created_at,
		CartUpdatedAtVO $updated_at,

    ): Cart
    {
        return new Cart(
				$uuid,
				$user_uuid,
				$status,
				$created_at,
				$updated_at,

        );
    }

    public static function random(): Cart
    {
        return self::create(
			CartUuidVOMother::random(),
			CartUserUuidVOMother::random(),
			CartStatusVOMother::random(),
			CartCreatedAtVOMother::random(),
			CartUpdatedAtVOMother::random(),

        );
    }
}
