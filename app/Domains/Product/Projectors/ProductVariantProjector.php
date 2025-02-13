<?php

declare(strict_types=1);

namespace App\Domains\Product\Projectors;

use App\Domains\Product\Events\ProductVariantCreated;
use App\Domains\Product\Projections\ProductVariant;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class ProductVariantProjector extends Projector
{
    public function onProductVariantCreated(ProductVariantCreated $event): void
    {
        ProductVariant::new()
            ->writeable()
            ->create([
                'uuid' => $event->aggregateRootUuid(),
                'product_uuid' => $event->productUuid,
                'sku' => $event->identifiers->sku,
                'slug' => $event->identifiers->slug,
                'size_id' => $event->details->sizeId,
                'color_id' => $event->details->colorId,
                'price' => $event->details->price,
                'is_active' => $event->details->isActive,
            ]);
    }
}
