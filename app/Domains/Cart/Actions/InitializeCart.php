<?php

declare(strict_types=1);

namespace App\Domains\Cart\Actions;

use App\Domains\Cart\CartAggregateRoot;
use App\Domains\Cart\Data\CartIdentifiersData;
use App\Domains\Cart\Exceptions\CartNotFoundException;
use App\Domains\Cart\Projections\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

final class InitializeCart
{
    public function __invoke(CartIdentifiersData $cartIdentifiers): Cart
    {
        $cacheKey = $cartIdentifiers->customerUuid
            ? "cart:{$cartIdentifiers->customerUuid}"
            : "cart:session:{$cartIdentifiers->sessionId}";

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $cart = Cart::query()
            ->when($cartIdentifiers->isCustomer(), fn ($query) => $query->where('customer_uuid', $cartIdentifiers->customerUuid))
            ->when($cartIdentifiers->isGuest(), fn ($query) => $query->where('session_id', $cartIdentifiers->sessionId))
            ->first();

        if ($cart) {
            Cache::put($cacheKey, $cart, now()->addMinutes(config('session.lifetime')));

            return $cart;
        }

        $cartUuid = Str::uuid()->toString();
        CartAggregateRoot::retrieve(uuid: $cartUuid)
            ->initializeCart(cartIdentifiersData: $cartIdentifiers)
            ->persist();

        $cart = Cart::query()->firstWhere('uuid', $cartUuid);

        if (! $cart) {
            throw new CartNotFoundException('Cart not found after event processing');
        }

        Cache::put($cacheKey, $cart, now()->addMinutes(config('session.lifetime')));

        return $cart;
    }
}
