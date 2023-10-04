<?php

declare(strict_types=1);

namespace Src\Cart\Domain\Cart\ValueObjects;

use Src\Cart\Domain\Cart\CartConstants;
use Src\Shared\Domain\ValueObjects\StringVO;

final class CartStatusVO extends StringVO
{
    /**
     * @throws \Exception
     */
    public function __construct(string $value)
    {
        $this->ensureStatusIsCorrect($value);

        parent::__construct($value);
    }

    /**
     * @throws \Exception
     */
    private function ensureStatusIsCorrect(string $status)
    {
        if (!in_array($status, CartConstants::STATUS)) {
            throw new \Exception('The current cart status is not available');
        }
    }
}
