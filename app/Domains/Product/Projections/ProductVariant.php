<?php

namespace App\Domains\Product\Projections;

use App\Domains\Shared\Data\PriceData;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\EventSourcing\Projections\Projection;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $uuid
 * @property string $product_uuid
 * @property string $sku
 * @property string $slug
 * @property string $size
 * @property string $color
 * @property PriceData $price
 * @property bool $is_active
 * @property-read Product $product
 * @property-read Size $size
 * @property-read Color $color
 * @property-read Collection<ProductAttribute> $attributes
 */
final class ProductVariant extends Projection
{
    use HasFactory;
    use HasTranslations;
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'product_uuid', 'sku', 'slug', 'size_id', 'color_id', 'price', 'is_active'];

    /**
     * Get the product of the variant.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_uuid', 'uuid');
    }

    /**
     * Get the size of the variant.
     */
    public function size(): HasOne
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    /**
     * Get the color of the variant.
     */
    public function color(): HasOne
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }

    /**
     * Get the attributes of the variant.
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_variant_uuid');
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
