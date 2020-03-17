<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
