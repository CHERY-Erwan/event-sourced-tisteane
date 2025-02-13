<?php

namespace App\Domains\Cart\Data;

use Spatie\LaravelData\Data;

final class CartIdentifiersData extends Data
{
    public function __construct(
        public ?string $customerUuid,
        public string $sessionId,
    ) {}

    public function isCustomer(): bool
    {
        return $this->customerUuid !== null;
    }

    public function isGuest(): bool
    {
        return $this->customerUuid === null;
    }
}
