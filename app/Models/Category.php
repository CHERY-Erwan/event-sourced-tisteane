<?php

namespace App\Models;

use App\Domains\Product\Projections\Product;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

final class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUuids;
    use SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'label', 'slug'];

    public $translatable = ['label'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_uuid', 'uuid');
    }
}
