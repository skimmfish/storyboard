<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    private $user;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'email_verified_at',
        'active',
        'profile_img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function Content(){
$this->hasMany('\App\Models\Content');
}

public function Comment(){
    return $this->hasMany('\App\Models\Comment');
    }
/*
*This function pulls user's data and return value requested for as the $f parameter
*@param int<$id>
*@param String<$f>
*/

public static function get_user_data($id,$f){
$userModel = array();

$userModel = \App\Models\User::find($id);

$valueToReturn = null;


if($userModel!=null){
    print_r($userModel);
foreach($userModel as $e){
//$valueToReturn = $e[$f];
}
}else{
$valueToReturn = null;
}
return $valueToReturn;
}
}
