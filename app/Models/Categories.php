<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = 'cat_id';

    public function Products()
    {
        return $this->hasMany('App\Models\Products', 'cat_id', 'cat_id');
    }
}
