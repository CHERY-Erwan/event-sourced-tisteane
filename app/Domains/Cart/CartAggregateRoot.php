<?php

declare(strict_types=1);

namespace App\Domains\Cart;

use App\Domains\Cart\Data\CartIdentifiersData;
use App\Domains\Cart\Events\CartInitialized;
use App\Domains\Cart\Projections\CartItem;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

final class CartAggregateRoot extends AggregateRoot
{
    /** @var array<string, CartItem> */
    public array $cartItems = [];

    /**
     * Initialise un panier pour un client ou une session.
     */
    public function initializeCart(CartIdentifiersData $cartIdentifiersData): self
    {
        $this->recordThat(new CartInitialized(
            cartIdentifiersData: $cartIdentifiersData,
        ));

        return $this;
    }
}
