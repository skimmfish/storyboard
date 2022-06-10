<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagManager extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = ['tag_name'];
    protected $date = ['created_at','updated_at','deleted_at'];
    protected $guarded = [];

    public function Content(){
        return $this->hasMany('\App\Models\Content');
    }

}

