<?php

declare(strict_types=1);

namespace App\Domains\Product\Data;

use Spatie\LaravelData\Data;

final class ProductIdentifiersData extends Data
{
    public function __construct(
        public string $uuid,
        public string $sku,
        public string $slug
    ) {}
}
