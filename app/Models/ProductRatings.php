<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatings extends Model
{
    use HasFactory;

    protected $table = "product_rating";
    protected $primaryKey = 'rate_id';
}
