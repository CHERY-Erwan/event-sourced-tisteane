<?php

declare(strict_types=1);

namespace App\Domains\Product\Data;

use Spatie\LaravelData\Data;

final class ProductVariantDetailsData extends Data
{
    public function __construct(
        public int $sizeId,
        public int $colorId,
        public int $price,
        public bool $isActive,
    ) {}
}
