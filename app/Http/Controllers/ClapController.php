<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claps;

class ClapController extends Controller
{

/*
*
*
*/
public static function show_clap_count($postid){
return $clap = DB::select('clap_count')->where('post_id',$id)->get();
}

}
