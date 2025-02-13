<?php

declare(strict_types=1);

namespace App\Domains\Product\Projectors;

use App\Domains\Product\Events\ProductCreated;
use App\Domains\Product\Projections\Product;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class ProductProjector extends Projector
{
    public function onProductCreated(ProductCreated $event): void
    {
        Product::new()
            ->writeable()
            ->create([
                'uuid' => $event->aggregateRootUuid(),
                'category_uuid' => $event->categoryUuid,
                'sku' => $event->identifiers->sku,
                'slug' => $event->identifiers->slug,
                'label' => $event->details->label,
                'short_description' => $event->details->shortDescription,
                'description' => $event->details->description,
                'stock' => $event->details->stock,
                'is_active' => $event->details->isActive,
                'is_featured' => $event->details->isFeatured,
            ]);
    }
}
