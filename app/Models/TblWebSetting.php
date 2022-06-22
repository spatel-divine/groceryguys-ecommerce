<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblWebSetting extends Model
{
    use HasFactory;

    protected $table = "tbl_web_setting";
    protected $primaryKey = 'set_id';
}
