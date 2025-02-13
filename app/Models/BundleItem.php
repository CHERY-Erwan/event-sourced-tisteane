<?php

namespace App\Models;

use App\Domains\Product\Projections\ProductVariant;
use Illuminate\Database\Eloquent\Model;

final class BundleItem extends Model
{
    protected $fillable = ['bundle_uuid', 'product_variant_uuid', 'quantity'];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class, 'bundle_uuid', 'uuid');
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_uuid', 'uuid');
    }
}
