<?php

declare(strict_types=1);

namespace Src\Product\Domain\Product\ValueObjects;

use Src\Shared\Domain\ValueObjects\FloatVO;

final class ProductPriceVO extends FloatVO
{
    /**
     * @throws \Exception
     */
    public function __construct(float $value)
    {

        $this->validatePrice($value);

        parent::__construct($value);
    }

    private function validatePrice(float $price)
    {
        if ($price < 0) {
            throw new \Exception('the price cannot be less than 0');
        }
    }
}
