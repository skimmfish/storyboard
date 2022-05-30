<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['author','post_title','post_bg_img','post_body','author_id','publish_status','description','category','post_banner-one'];
    protected $dates = ['created_at','updated_at','deleted_at'];

public function User(){
return $this->belongsTo('\App\Models\User');
}

//creating a relationship between the comments and posts table
public function Comments(){
    return $this->hasMany('\App\Models\Comment');
}

public function Claps(){
    return $this->hasOne('\App\Models\Claps');
}
/*
*parseDate
@param datetime <$date>
@return Carbonized String<$date>
*/
public static function parseDate($date){

return date('d, F Y h:i:s A', strtotime($date));

}

}
