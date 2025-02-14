<?php

declare(strict_types=1);

namespace App\Domains\Product\Data;

use Spatie\LaravelData\Data;

final class ProductDetailsData extends Data
{
    public function __construct(
        public string $shortLabel,
        public array $label,
        public array $description,
        public array $shortDescription,
        public int $stock,
        public bool $isActive,
        public bool $isFeatured
    ) {}
}
