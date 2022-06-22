<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "cart";
    protected $primaryKey = 'cart_id';

    public function Products()
    {
        return $this->hasOne('App\Models\Products', 'product_id', 'product_id')->with('ProductImages', 'ProductVariantwithRatings');
    }
}
