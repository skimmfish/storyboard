<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailSubscriptionController extends Controller
{
public function store(Request $request){

    $validate = $request->validate([
        'email'=>'required | max:256'
    ]);

$email_subscriptions = new EmailSubscription;
$email_subscriptions->email = $request->_email;
$email_subscriptions->post_id_sub_to=$request->post_id_sub_to;

//saving to db table
$email_subscriptions->save();

flash("Email address saved successfully")->success();
//return redirect()->route('blog',['id'=>$request->post_id_sub_to]);

}
}
