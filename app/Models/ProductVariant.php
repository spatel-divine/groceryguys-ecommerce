<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = "product_varient";
    protected $primaryKey = 'varient_id';

    public function ProductRatings()
    {
        return $this->hasMany('App\Models\ProductRatings', 'varient_id', 'varient_id');
    }
}
