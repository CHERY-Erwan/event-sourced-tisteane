<?php

namespace App\Domains\Product\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class ProductAttributeCreated extends ShouldBeStored
{
    public function __construct(
        public string $productVariantUuid,
        public string $key,
        public string $value,
    ) {}
}
