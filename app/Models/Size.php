<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class Size extends Model
{
    use HasTranslations;

    protected $fillable = ['code', 'label'];

    public $translatable = ['label'];
}
