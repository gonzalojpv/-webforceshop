<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    /**
     * Get the categories for the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images() {
        return $this->hasMany('App\ProductImage');
    }
}
