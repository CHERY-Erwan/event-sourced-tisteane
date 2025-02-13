<?php

declare(strict_types=1);

namespace App\Domains\Product\Events;

use App\Domains\Product\Data\ProductIdentifiersData;
use App\Domains\Product\Data\ProductVariantDetailsData;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class ProductVariantCreated extends ShouldBeStored
{
    public function __construct(
        public ProductIdentifiersData $identifiers,
        public ProductVariantDetailsData $details,
        public string $productUuid,
    ) {}
}
