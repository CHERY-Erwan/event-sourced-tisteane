<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

final class Bundle extends Model
{
    use HasTranslations;
    use HasUuids;
    use SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'slug', 'label', 'description', 'price', 'is_active'];

    public $translatable = ['label', 'description'];

    public function items()
    {
        return $this->hasMany(BundleItem::class, 'bundle_uuid', 'uuid');
    }
}
