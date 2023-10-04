<?php

declare(strict_types=1);

namespace Src\Cart\Domain\CartItem\ValueObjects;

use Src\Shared\Domain\ValueObjects\IntegerVO;

final class CartItemAmountVO extends IntegerVO
{
    /**
     * @throws \Exception
     */
    public function __construct(int $value)
    {
        $this->ensureAmountIsNotLessThanZero($value);

        parent::__construct($value);
    }

    private function ensureAmountIsNotLessThanZero(int $value)
    {
        if ($value < 0) {
            throw new \Exception('The amount of cartItem cannot be less than 0');
        }
    }
}
