<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['id','email','active'];
    protected $date = ['deleted_at','created_at','updated_at'];
}
