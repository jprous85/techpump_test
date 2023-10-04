<?php

declare(strict_types=1);


namespace Src\Cart\Domain\Cart;


final class CartConstants
{
    public const DRAFT = 'DRAFT';
    public const PROCESSED = 'PROCESSED';

    public const STATUS = [self::DRAFT, self::PROCESSED];

}
