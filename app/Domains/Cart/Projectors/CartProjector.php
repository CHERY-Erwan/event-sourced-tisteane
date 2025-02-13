<?php

declare(strict_types=1);

namespace App\Domains\Cart\Projectors;

use App\Domains\Cart\Events\CartInitialized;
use App\Domains\Cart\Projections\Cart;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class CartProjector extends Projector
{
    public function onCartInitialized(CartInitialized $event): void
    {
        Cart::new()
            ->writeable()
            ->create([
                'uuid' => $event->aggregateRootUuid(),
                'customer_uuid' => $event->cartIdentifiersData->customerUuid,
                'session_id' => $event->cartIdentifiersData->sessionId,
            ]);
    }
}
