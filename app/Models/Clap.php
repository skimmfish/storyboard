<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clap extends Model
{
use HasFactory;
use SoftDeletes;

protected $fillable = ['clap_count','post_id'];
protected $date = ['deleted_at','created_at','updated_at'];
protected $guarded = [];

public function Content(){
    return $this->hasOne('\App\Models\Content');
}
}
