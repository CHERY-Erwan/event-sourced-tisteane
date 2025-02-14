<?php

namespace App\Domains\Product\Projections;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EventSourcing\Projections\Projection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $uuid
 * @property string $category_uuid
 * @property string $sku
 * @property string $slug
 * @property string $label
 * @property string $description
 * @property int $stock
 * @property bool $is_active
 * @property bool $is_featured
 * @property-read Collection<ProductVariant> $variants
 * @property-read Collection<ProductAttribute> $attributes
 */
final class Product extends Projection implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use HasUuids;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'category_uuid', 'sku', 'slug', 'short_label', 'label', 'short_description', 'description', 'stock', 'is_active', 'is_featured'];

    public $translatable = ['label', 'short_description', 'description'];

    public $appends = ['homepage_attachment'];

    protected function homepageAttachment(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('homepage_attachment', 'webp')
        );
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections(
                'homepage_attachment',
            )
            ->nonQueued();
    }

    /**
     * Get the category of the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_uuid', 'uuid');
    }

    /**
     * Get the variants of the product.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'product_uuid', 'uuid')
            ->isActive();
    }

    /**
     * Scope pour filtrer les produits actifs.
     */
    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope pour filtrer les produits en vedette.
     */
    public function scopeIsFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
