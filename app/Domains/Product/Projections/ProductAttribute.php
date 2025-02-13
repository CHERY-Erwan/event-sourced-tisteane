<?php

namespace App\Domains\Product\Projections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property string $product_variant_uuid
 * @property string $key
 * @property string $value
 * @property-read Collection<ProductVariant> $attributes
 */
final class ProductAttribute extends Projection
{
    use HasFactory;

    protected $fillable = ['product_variant_uuid', 'key', 'value'];

    /**
     * Get the variant of the attribute.
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_uuid');
    }
}
