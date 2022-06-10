<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsManager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['ads_name','ads_code','active'];
    protected $date = [    'created_at','deleted_at','updated_at'];
}
