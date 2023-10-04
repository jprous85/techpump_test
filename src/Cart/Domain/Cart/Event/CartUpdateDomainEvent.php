<?php

declare(strict_types=1);

namespace Src\Cart\Domain\Cart\Event;

use Src\Cart\Domain\Cart\Cart;
use Src\Shared\Domain\Bus\Event\DomainEvent;

class CartUpdateDomainEvent extends DomainEvent
{
    public function __construct(
        private int $id,
        private Cart $cart,
        private string $eventDate
    ) {
        parent::__construct($id, $eventDate);
    }

    public static function eventName(): string
    {
        return 'cart.updated';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(int $aggregateId, array $body, string $eventId, string $eventDate): DomainEvent
    {
        return new self(
            $aggregateId,
            $body['cart'],
            $eventDate
        );
    }
}
