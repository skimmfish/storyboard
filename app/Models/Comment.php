<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['comment_author','author_id','comment','pub_status','post_id'];

    protected $date = ['created_at','updated_at','deleted_at'];

    protected $guarded = [];

    public function Content(){

        return $this->hasOne('\App\Models\Content');

    }

    public function User(){
        return $this->belongsTo('\App\Models\User');
        }

        public static function parseDate($date){
            return date('d F Y, h:i:s A',time());
        }
}
