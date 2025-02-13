<?php

declare(strict_types=1);

namespace App\Domains\Product\Projectors;

use App\Domains\Product\Events\ProductAttributeCreated;
use App\Domains\Product\Projections\ProductAttribute;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class ProductAttributeProjector extends Projector
{
    public function onProductAttributeCreated(ProductAttributeCreated $event): void
    {
        ProductAttribute::new()
            ->writeable()
            ->create([
                'product_variant_uuid' => $event->productVariantUuid,
                'key' => $event->key,
                'value' => $event->value,
            ]);
    }
}
