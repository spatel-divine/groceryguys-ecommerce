<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $primaryKey = 'product_id';

    public function Categories()
    {
        return $this->hasOne('App\Models\Categories', 'cat_id', 'cat_id');
    }

    public function ProductImages()
    {
        return $this->hasOne('App\Models\ProductImages', 'product_id', 'product_id');
    }

    public function ProductVariantwithRatings()
    {
        return $this->hasOne('App\Models\ProductVariant', 'product_id', 'product_id')->with('ProductRatings');
    }
}
