<?php

declare(strict_types=1);

namespace App\Domains\Product\Events;

use App\Domains\Product\Data\ProductDetailsData;
use App\Domains\Product\Data\ProductIdentifiersData;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class ProductCreated extends ShouldBeStored
{
    public function __construct(
        public ProductIdentifiersData $identifiers,
        public ProductDetailsData $details,
        public string $categoryUuid,
    ) {}
}
