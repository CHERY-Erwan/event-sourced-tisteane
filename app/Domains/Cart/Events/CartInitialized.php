<?php

declare(strict_types=1);

namespace App\Domains\Cart\Events;

use App\Domains\Cart\Data\CartIdentifiersData;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class CartInitialized extends ShouldBeStored
{
    public function __construct(
        public CartIdentifiersData $cartIdentifiersData,
    ) {}
}
