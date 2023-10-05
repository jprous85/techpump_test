<?php

declare(strict_types=1);

namespace Src\Product\Domain\Product\ValueObjects;

use Src\Shared\Domain\ValueObjects\IntegerVO;

final class ProductAmountVO extends IntegerVO
{
    /**
     * @throws \Exception
     */
    public function __construct(int $value)
    {
        $this->validateAmount($value);

        parent::__construct($value);
    }

    /**
     * @throws \Exception
     */
    private function validateAmount(int $amount)
    {
        if ($amount < 0) {
            throw new \Exception('the amount cannot be less than 0');
        }
    }
}
